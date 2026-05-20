function ellenorzes() {
  let jo = true;

  let nev = document.getElementById('nev');
  let email = document.getElementById('email');
  let darab = document.getElementById('darab');
  let nap = document.getElementById('nap');

  let checkPattern =
    /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

  nev.classList.remove('hiba');
  email.classList.remove('hiba');
  darab.classList.remove('hiba');
  nap.classList.remove('hiba');

  if (nev.value == '' || nev.value.length < 8 || nev.value.length > 30) {
    nev.classList.add('hiba');
    jo = false;
  }

  if (email.value == '' || !checkPattern.test(email.value)) {
    email.classList.add('hiba');
    jo = false;
  }

  if (
    darab.value == '' ||
    isNaN(darab.value) ||
    darab.value < 1 ||
    darab.value > 10
  ) {
    darab.classList.add('hiba');
    jo = false;
  }

  if (nap.value == '') {
    nap.classList.add('hiba');
    jo = false;
  }

  return jo;
}
