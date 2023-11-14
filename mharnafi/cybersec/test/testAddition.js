import {addition} from "../source/addition.mjs";
import assert from "assert";

it('Test de base OK',()=> {
    assert.equal(addition(1,7,8,4,1),21,"Je calcule mal")
})

// it('Test de base KO',()=> {
//     assert.equal(addition(1,7,8,4,1),20,"Je calcule mal")
// })