export const verifPassword = (mdp) => {
    let points_total = 6;
    const longueur = mdp.length; // nombre de caractères de mdp
    let points_long = 0;     // points pour la longueur, soit 0, soit 1
    let points_comp = 0;     // points pour la complexité
    if (longueur >= 12) {points_long = 1;}
    if (/[a-z]/.test(mdp)) {points_comp += 1;}
    if (/[A-Z]/.test(mdp)) {points_comp += 2;}
    if (/[0-9]/.test(mdp)) {points_comp += 3;}
    if (/[\W_]/.test(mdp)) {points_comp += 4;}

    const resultat = points_long * points_comp;
    return points_total === resultat;
}