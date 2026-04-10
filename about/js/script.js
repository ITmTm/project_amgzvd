$(document).ready(()=> {
    document.querySelector('.sign_tour').addEventListener('click', ()=>{
        openModalMail('Записаться на экскурсию')
    })
    document.querySelector('.send_partner').addEventListener('click', ()=>{
        openModalMail('Стать партнером')
    })
})