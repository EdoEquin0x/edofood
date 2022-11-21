const actualpage = window.location.href



const index = document.getElementById('index')

const login = document.getElementById('login')
const register = document.getElementById('register')

const selection = document.getElementById('selection')
const pannel = document.getElementById('panel')

const logout = document.getElementById('logout')


// MOBILE
const index2 = document.getElementById('index2')

const login2 = document.getElementById('login2')
const register2 = document.getElementById('register2')

const selection2 = document.getElementById('selection2')
const pannel2 = document.getElementById('panel2')

const logout2 = document.getElementById('logout2')


    
      



if (actualpage.includes("index.php")) {
    index.classList.toggle('selected')
}
if (actualpage.includes("login.php")) {
    login.classList.toggle('selected')
}
if (actualpage.includes("register.php")) {
    register.classList.toggle('selected')
}
if (actualpage.includes("selection.php")) {
    selection.classList.toggle('selected')
}
if (actualpage.includes("pannel.php")) {
    pannel.classList.toggle('selected')
}


//MOBILE
if (actualpage.includes("index.php")) {
    index2.classList.toggle('selected')
}
if (actualpage.includes("login.php")) {
    login2.classList.toggle('selected')
}
if (actualpage.includes("register.php")) {
    register2.classList.toggle('selected')
}
if (actualpage.includes("selection.php")) {
    selection2.classList.toggle('selected')
}
if (actualpage.includes("pannel.php")) {
    pannel2.classList.toggle('selected')
}

