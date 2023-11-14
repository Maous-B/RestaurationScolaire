import {createRequire} from "module";
import {fileURLToPath} from 'url';
import crypto from "crypto";
export {sha512}
const require = createRequire(import.meta.url);
const bcrypt = require('bcrypt');
const argon2 = require('argon2');
const mysql = require('mysql2/promise');
const express = require('express');
const path = require('path');
const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename);

const connection = await mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'root',
    database:'cybersec_bdd'
})

const bodyParser = require('body-parser')
const app = express()
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended : false}))

const genereChaineAleatoire = (longueur => {
    return crypto.randomBytes((Math.ceil(longueur/2))).toString('hex').slice(0, longueur)
})

const sha512 = (password, salt) =>{
    const hash = crypto.createHmac('sha512', salt);
    hash.update(password);
    var valeurHashee = hash.digest('hex');
    return{
        salt:salt,
        passwordHash:valeurHashee
    }
}

function verifPassword(mdp) {
    const points_total = 6;
    const longueur = mdp.length; // nombre de caractères de mdp
    let points_long = 0;     // points pour la longueur, soit 0, soit 1
    let points_comp = 0;     // points pour la complexité
    if (longueur >= 8) {points_long = 1;}
    if (/[a-z]/.test(mdp)) {points_comp += 1;}
    if (/[A-Z]/.test(mdp)) {points_comp += 2;}
    if (/[0-9]/.test(mdp)) {points_comp += 3;}

    const resultat = points_long * points_comp;
    return points_total === resultat;
}


app.get('/', (requete, resultat) =>
{
    resultat.send("Bonjour");
})

app.get('/bonjour', (requete, resultat) =>
{
    resultat.sendFile(path.join(__dirname + "/bonjour.html"));
})

app.get('/login', (requete, resultat) =>
{
    resultat.sendFile(path.join(__dirname + "/login.html"));
})

app.get('/register', (requete, resultat) =>
{
    resultat.sendFile(path.join(__dirname + "/register.html"));
})

app.post('/login', async (requete, resultat) =>
{
    const username = requete.body.login;
    const password = requete.body.motDePasse;

    try {
        const [user] = await connection.query('SELECT * FROM auth WHERE login = ?', [username]);

        if (user.length === 0) {
            console.log('Nom utilisateur KO')
            resultat.status(401).send('Nom d\'utilisateur ou MDP incorrect');
            return;
        }

        const hashPass = sha512(password, user[0].grain_de_sel)


        const match = hashPass.passwordHash === user[0].pw
        if (match && user.length !== 0) {
            console.log("Ca marche, redirection...")
            resultat.redirect('/bonjour');
        } else {
            console.log("MDP Invalide...")
            resultat.status(401).send('Nom d\'utilisateur ou MDP incorrect');
        }
    } catch (error) {
        console.error(error);
        resultat.status(500).send('Erreur.');
    }
})

app.post('/register', async (requete, resultat) =>
{

    const checkUsernameQuery = 'SELECT * FROM auth WHERE login = ?';
    const [existingUser] = await connection.query(checkUsernameQuery, [requete.body.login]);

    if (existingUser.length > 0) {
        resultat.status(400).send('L\'utilisateur existe déjà');
        return;
    }

    // Création date côté serveur
    // Je pourrais faire mieux et plus simple en l'alimentant côté BDD
    // avec une valeur par défaut de ma date en BDD à la date du jour

    const currentDate = new Date();
    const year = String(currentDate.getFullYear()).slice(-2);
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');
    const hours = String(currentDate.getHours()).padStart(2, '0');
    const minutes = String(currentDate.getMinutes()).padStart(2, '0');
    const seconds = String(currentDate.getSeconds()).padStart(2, '0');


    const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

    //const hashedPassword = await bcrypt.hash(requete.body.motDePasse, 19);
    const salt = genereChaineAleatoire(64)
    const motDePasseHachee = sha512(requete.body.motDePasse, salt).passwordHash
    let post = {
        login: requete.body.login,
        pw: motDePasseHachee,
        grain_de_sel: salt,
        email : requete.body.email,
        numero_de_telephone: requete.body.telephone,
        date_de_creation: formattedDate
    }

    let sql = 'INSERT INTO auth SET ?'

    try {
        await connection.query(sql, post);
        resultat.redirect('/login');
    } catch (error) {
        console.error(error);
        resultat.status(500).send('Erreur interne du serveur');
    }
})

app.listen(3000, () =>{
    console.log('Serveur en écoute sur http://localhost:3000/')
    //const mdr = sha512('marwan', genereChaineAleatoire(64))
    //console.log(mdr.passwordHash, mdr.salt)
})