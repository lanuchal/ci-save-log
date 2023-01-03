const basicAlert = document.querySelector('#basic-alert'),
    withTitle = document.querySelector('#with-title'),
    footerAlert = document.querySelector('#footer-alert'),
    htmlAlert = document.querySelector('#html-alert');

// BASIC ALERT
basicAlert.onclick = function () {
    Swal.fire({
        title: 'Any fool can use a computer',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });
};

// ALERT WITH TITLE
withTitle.onclick = function () {
    Swal.fire({
        title: 'The Internet?,',
        text: 'That thing is still around?',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    })
}

// ALERT WITH FOOTER
footerAlert.onclick = function () {
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href>Why do I have this issue?</a>',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    })
}

// HTML ALERT
htmlAlert.onclick = function () {
    Swal.fire({
        title: '<strong>HTML <u>example</u></strong>',
        type: 'info',
        html:
            "You can use <b>bold text</b>, " +
            '<a href="https://pixinvent.com/" target="_blank">links</a> ' +
            "and other HTML tags",
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
        cancelButtonAriaLabel: 'Thumbs down',
        customClass: {
            confirmButton: 'btn btn-primary me-1',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    })
}

const bounceInAnimation = document.querySelector('#bounce-in-animation'),
 fadeInAnimation = document.querySelector('#fade-in-animation'),
 flipXAnimation = document.querySelector('#flip-x-animation'),
 tadaAnimation = document.querySelector('#tada-animation'),
 shakeAnimation = document.querySelector('#shake-animation');

// BOUNCE IN ANIMATION
bounceInAnimation.onclick = function() {
  Swal.fire({
    title: 'Bounce In Animation',
    showClass: {
      popup: 'animate__animated animate__bounceIn'
    },
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  })
}

// FADE IN ANIMATION
fadeInAnimation.onclick = function() {
  Swal.fire({
    title: 'Fade In Animation',
    showClass: {
      popup: 'animate__animated animate__fadeIn'
    },
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  })
}

// FLIP X ANIMATION
flipXAnimation.onclick = function() {
  Swal.fire({
    title: 'Flip In Animation',
    showClass: {
      popup: 'animate__animated animate__flipInX'
    },
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  })
}

// TADA ANIMATION
tadaAnimation.onclick = function() {
  Swal.fire({
    title: 'Tada Animation',
    showClass: {
      popup: 'animate__animated animate__tada'
    },
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  })
}

// SHAKE ANIMATION
shakeAnimation.onclick = function() {
  Swal.fire({
    title: 'Shake Animation',
    showClass: {
      popup: 'animate__animated animate__shakeX'
    },
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  })
}
