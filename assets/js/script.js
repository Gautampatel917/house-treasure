let shadow = document.querySelector('.shadow');
let move = document.querySelector('.move');
var isRight = true;

function rightSide() {
    let gp = gsap.timeline();

    if (isRight) {
        gp.to('.shadow', {
            /* position: 'absolute',
            left: '0%',
            right: 'auto', */
            x: -550,
            duration: 1.1,
            zIndex: '2'
        });
        move.setAttribute('value', 'SIGN IN');
        isRight = false;

    } else {
        gp.to('.shadow', {
            /* position: 'absolute',
            right: '0%',
            left: 'auto' */
            x: 0,
            duration: 1.1,
            zIndex: '2',
        });
        move.setAttribute('value', 'SIGN UP');
        isRight = true;
    }

    console.log('isRight value:', isRight);
}

move.addEventListener('click', rightSide);
