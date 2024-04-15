function profilePopup() {
    document.querySelector('.profile-modal').showModal();
}
function logoutPopup() {
    document.querySelector('.logout-modal').showModal();
}
function closeLogin() {
    document.querySelector('.profile-modal').close();
}
function closeSignup() {
    document.querySelector('.signup-modal').close();
}
function closeLogout() {
    document.querySelector('.logout-modal').close();
}
function openSignup() {
    document.querySelector('.profile-modal').close();
    document.querySelector('.signup-modal').showModal();
}
function openLogin() {
    document.querySelector('.signup-modal').close();
    document.querySelector('.profile-modal').showModal();
}
document.addEventListener('DOMContentLoaded', function() {
    var isModalOpen = sessionStorage.getItem('isModalOpen');
    var isLoginOpen = sessionStorage.getItem('isLoginOpen');
    if (isModalOpen === 'true') {
        var signupModal = document.querySelector('.signup-modal');
        if (signupModal) {
            signupModal.showModal(); // Open the modal if it was open before
            sessionStorage.removeItem('isModalOpen');
        }
    }
    if (isLoginOpen === 'true') {
        var loginModal = document.querySelector('.profile-modal');
        if (loginModal) {
            loginModal.showModal(); // Open the modal if it was open before
            sessionStorage.removeItem('isLoginOpen');
        }
    }
});