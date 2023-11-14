import {verifPassword} from "../source/verifPassword.mjs";
import assert from "assert";

it('Mot de passe (chiffre + majuscule + minuscule)',()=> {
    assert.equal(verifPassword("Quoicoubeh12"),false,"Pas bon résultat")
})

it('Mot de passe (chiffre + minuscule + longueur >= 8)',()=> {
    assert.equal(verifPassword("quoicoubeh12"),false,"Pas bon résultat")
})

it('Mot de passe (majuscule + minuscule + longueur >= 8)',()=> {
    assert.equal(verifPassword("Quoicoubeh"),true,"Pas bon résultat")
})

it('Mot de passe (majuscule + minuscule + longueur < 8)',()=> {
    assert.equal(verifPassword("Quoico1"),true,"Pas bon résultat")
})
