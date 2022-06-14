

const app = {

    // fonction d'initialisation
        init : function () {
               
        // Récupération du bouton "about me"
        let aboutMeElement = document.querySelector(".about-me");
        aboutMeElement.addEventListener("click", app.handleClickAboutMe);

        // Récupération du bouton "projects"
        let projectsElement = document.querySelector(".projects");
        projectsElement.addEventListener("click", app.handleClickProjects);

        // Récupération du bouton "skills"
        let skillsElement = document.querySelector(".skills");
        skillsElement.addEventListener("click", app.handleClickSkills); 
        
        //Récupération du bouton "phone"
        let phoneElement = document.querySelector(".phone");
        phoneElement.addEventListener("click", app.handleClickPhone);
        
    },

    // fonction pour enlever la surbrillance du bouton sélectionné
    desactivateButtons : function (evt) {
        // On cherche tous les boutons du menu pour enlever la class active
        const buttons = document.querySelectorAll(".button");
        buttons.forEach((button) => 
        button.classList.remove('active'),
        )

    },

    // fonction pour cacher le contenu 
    hideContent : function (evt) {
        // On cherche tous les éléments "content" pour cacher le contenu
        const contents = document.querySelectorAll(".content");
        contents.forEach((content) => 
        content.classList.add('inactive'),
        )

    },

    // Le bouton 'About me' est mis en surbrillance et son contenu associé est affiché
    handleClickAboutMe : function(evt) {
       
    app.desactivateButtons();
    this.classList.add("active");
    
    app.hideContent();
    let aboutMeContent = document.querySelector(".about-me__content");
    aboutMeContent.classList.remove("inactive");
 
    },

    // Le bouton 'Projects' est mis en surbrillance et son contenu associé est affiché
    handleClickProjects : function(evt) {

    app.desactivateButtons();
    this.classList.add("active");
    
    app.hideContent();
    let projectsContent = document.querySelector(".projects__content");
    projectsContent.classList.remove("inactive");

    },

    // Le bouton 'Skills' est mis en surbrillance et son contenu associé est affiché
    handleClickSkills : function(evt) {

    app.desactivateButtons();
    this.classList.add("active");
        
    app.hideContent();
    let skillsContent = document.querySelector(".skills__content");
    skillsContent.classList.remove("inactive");

    },

    
    openNav : function(evt) {
        let sidenav = document.getElementById("mySidenav");
        sidenav.classList.add("active");
    },
      

    closeNav : function(evt) {
        let sidenav = document.getElementById("mySidenav");
        sidenav.classList.remove("active");
    },

    handleClickPhone : function(evt) {
        let divElement = document.getElementById('phoneDiv');
        if (divElement)
        {
            divElement.remove();
        }
        else {
        let newDiv = document.createElement("div");
        newDiv.id ='phoneDiv';
        newDiv.className="phoneContent";
        let phoneContent = document.createTextNode('06 84 73 14 65');
        newDiv.appendChild(phoneContent);

        let currentDiv = document.getElementById('phone__number');
        currentDiv.appendChild(newDiv);
        }

    },

};



// Animation pour faire apparaitre le contenu 
const sr = ScrollReveal ({
    delay: 300,
    origin: 'top',
    distance: '60px',
    duration: '1500'
})

sr.reveal('.main', {delay: 200});
sr.reveal('.title', {delay: 400});
sr.reveal('.link', {delay: 600});
sr.reveal('.menu', {delay: 800});
sr.reveal('.display', {delay: 1000});


document.addEventListener( "DOMContentLoaded" , app.init);

