export const addition = (...listeNombre) => {
    let somme=0;
    listeNombre.forEach(nombre => somme+=nombre)
    return  somme
}

// console.log(addition(1,2,3,4))