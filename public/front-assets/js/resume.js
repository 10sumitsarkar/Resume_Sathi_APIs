document.addEventListener('DOMContentLoaded', function () {
    const resumeForm = document.getElementById('resumeForm');
    const savedResumesDiv = document.getElementById('savedResumes');
    const resumeIndexField = document.getElementById('resumeIndex');
    const saveButton = document.getElementById('saveButton');

    document.getElementById('photo').addEventListener('change', function (e) {
        const fileInput = e.target.files[0];
        if (fileInput) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const base64String = event.target.result;
                document.getElementById('picture').src = base64String;
                document.getElementById('picture').style.display = 'block';
                document.getElementById('base64').value = base64String;
            };
            reader.readAsDataURL(fileInput);
        } else {
            alert('Please select an image first.');
        }
    });

    resumeForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(resumeForm);
        const experiences = [];
        const educations = [];
        const socials = [];
        const skills = [];
        const languages = [];
        formData.getAll('experienceTitle[]').forEach((title, index) => {
            experiences.push({
                title: title,
                company: formData.getAll('experienceCompany[]')[index],
                city: formData.getAll('experienceCity[]')[index],
                state: formData.getAll('experienceState[]')[index],
                from: formData.getAll('experienceFrom[]')[index],
                to: formData.getAll('experienceTo[]')[index],
                description: formData.getAll('experienceDescription[]')[index]
            });
        });

        formData.getAll('educationField[]').forEach((field, index) => {
            educations.push({
                field: field,
                degree: formData.getAll('educationDegree[]')[index],
                school: formData.getAll('educationSchool[]')[index],
                location: formData.getAll('educationLocation[]')[index],
                from: formData.getAll('educationFrom[]')[index],
                to: formData.getAll('educationTo[]')[index],
                description: formData.getAll('educationDescription[]')[index],
            });
        });

        formData.getAll('socialName[]').forEach((name, index) => {
            socials.push({
                name: name,
                link: formData.getAll('socialLink[]')[index],
            });
        });

        document.querySelectorAll('#skillsList .skill-item').forEach(skillItem => {
            skills.push(skillItem.firstChild.textContent.trim());
        });

        document.querySelectorAll('#languagesList .language-item').forEach(languageItem => {
            languages.push(languageItem.firstChild.textContent.trim());
        });

        const imgInp = document.getElementById('base64').value;
        const resume = {
            photo: imgInp,
            name: formData.get('name'),
            email: formData.get('email'),
            phone: formData.get('phone'),
            address: formData.get('address'),
            jobTitle: formData.get('jobTitle'),
            aboutMe: formData.get('aboutMe'),
            websiteLink: formData.get('websiteLink'),
            educations: educations,
            experiences: experiences,
            socials: socials,
            skills: skills,
            languages: languages,
            template: formData.get('template')
        };

        const resumes = JSON.parse(localStorage.getItem('resumes')) || [];
        const index = resumeIndexField.value;

        if (index) {
            resumes[index] = resume;
            resumeIndexField.value = '';
            saveButton.textContent = 'Save Resume';
        } else {
            resumes.push(resume);
        }

        localStorage.setItem('resumes', JSON.stringify(resumes));
        displaySavedResumes();
        resumeForm.reset();
        document.getElementById('picture').style.display = 'none';
        clearAdditionalFields(false);
        document.getElementById('skillsList').innerHTML = '';
        document.getElementById('languagesList').innerHTML = '';

        // Hide everythis after save or update resume

        const savedResumeDiv = document.querySelector('.all-saved-resume')
        savedResumeDiv.classList.add('d-none')
    });

    function displaySavedResumes() {
        const resumes = JSON.parse(localStorage.getItem('resumes')) || [];
        savedResumesDiv.innerHTML = '';

        resumes.forEach((resume, index) => {
            const resumeDiv = document.createElement('div');
            resumeDiv.className = `resume ${resume.template} col-md-6 col-lg-4 mt-4`;
            let experienceHtml = '';
            resume.experiences.forEach(exp => {
                experienceHtml += `
                  <div class="experience">
            <p>Title: ${exp.title ? exp.title : 'N/A'}</p>
            <p>Company: ${exp.company ? exp.company : 'N/A'}</p>
            <p>City: ${exp.city ? exp.city : 'N/A'}</p>
            <p>State: ${exp.state ? exp.state : 'N/A'}</p>
            <p>From: ${exp.from ? exp.from : 'N/A'} - To: ${exp.to ? exp.to : 'N/A'}</p>
            <p>Description: ${exp.description ? exp.description : 'N/A'}</p>
        </div>
                `;
            });

            let educationHtml = '';
            resume.educations.forEach(edu => {
                educationHtml += `
                    <div class="education">
                        <p>School: ${edu.location ? edu.location : 'N/A'}</p>
                        <p>Field: ${edu.field ? edu.field : 'N/A'}</p>
                        <p>Degree: ${edu.degree ? edu.degree : 'N/A'}</p>
                        <p>School: ${edu.school ? edu.school : 'N/A'}</p>
                        <p>From: ${edu.from ? edu.from : 'N/A'} - To: ${edu.to ? edu.to : 'N/A'}</p>
                        <p>Description: ${edu.description ? edu.description : 'N/A'}</p>
                    </div>
                `;
            });

            let socialHtml = '';
            resume.socials.forEach(social => {
                socialHtml += `
                    <div class="education">
                        <p>Social Name: ${social.name}</p>
                        <p>Social Link: ${social.link}</p>                        
                    </div>
                `;
            });

            let skillsHtml = '';
            resume.skills.forEach(skill => {
                skillsHtml += `<li class="skill-item">${skill} <button type="button" onclick="editSkill(${index}, '${skill}')"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button><button type="button" onclick="deleteSkill(${index}, '${skill}')"><svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button></li>`;

            });

            let languagesHtml = '';
            resume.languages.forEach(language => {
                languagesHtml += `<li class="language-item">${language} <button type="button" onclick="editLanguage(${index}, '${language}')"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button><button type="button" onclick="deleteLanguage(${index}, '${language}')"><svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button></li>`;
            });

            resumeDiv.innerHTML = `

               <div class="resume-card-container">
	<div class="top-area">
<span class="pro">FREE</span>
	<div>
		<div class="card-resume-img-div">
			 <img src="${resume.photo ? resume.photo : 'front-assets/images/resume-img/resume-default-img.svg'}" style="${resume.photo ? 'object-fit:cover' : 'object-fit:unset'}"/>
		</div>
	</div>
	<h3 class="card-name">${resume.name ? resume.name : 'N/A'}</h3>
	<h6 class="card-job-title">${resume.jobTitle ? resume.jobTitle : 'N/A'}</h6>
	<p class="card-about">${resume.aboutMe ? resume.aboutMe : 'N/A'}</p>
    <p class="card-website">${resume.websiteLink ? resume.websiteLink : 'N/A'}</p>

	<div class="email-phone">
		<p>${resume.email ? resume.email : 'N/A'} | ${resume.phone ? resume.phone : 'N/A'}</p>
	</div>
	<div class="card-buttons">
		<button class="edit-btn" onclick="editResume(${index})">
		
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_1137_10909)">
<path d="M18.5488 0.226871C18.2709 0.222074 17.9949 0.27321 17.7372 0.377237C17.4795 0.481265 17.2454 0.636058 17.0488 0.83241L16.1257 1.7841L22.2115 7.89949L23.1346 6.94872C23.3337 6.7499 23.4917 6.51378 23.5995 6.25386C23.7072 5.99394 23.7627 5.71533 23.7627 5.43395C23.7627 5.15257 23.7072 4.87395 23.5995 4.61404C23.4917 4.35412 23.3337 4.118 23.1346 3.91918L20.0774 0.861025C19.6711 0.456792 19.1219 0.228947 18.5488 0.226871ZM15.0872 2.62133L13.6444 4.00595L19.9906 10.3521L21.462 8.9961L15.0872 2.62133ZM12.7204 5.01579L2.74199 14.9084C2.62861 14.9664 2.52885 15.0479 2.44929 15.1473C2.36973 15.2468 2.31218 15.362 2.28045 15.4853L0.144448 22.7269C0.0962202 22.8833 0.0915593 23.0499 0.130967 23.2087C0.170375 23.3676 0.252359 23.5127 0.368096 23.6285C0.483833 23.7442 0.628942 23.8262 0.787804 23.8656C0.946667 23.905 1.11327 23.9003 1.26968 23.8521L8.51029 21.717C8.67465 21.6925 8.82901 21.6229 8.95625 21.516C9.0835 21.4092 9.17867 21.2691 9.23122 21.1115L19.0675 11.361L17.7124 10.0059L7.61583 20.1312L3.54876 21.3127L2.68291 20.4478L3.92352 16.2081L13.9334 6.22687L12.7204 5.01579ZM14.9128 7.23672L4.78845 17.3906L6.25891 17.7072L6.46106 19.0641L16.6149 8.93795L14.9128 7.23672Z" fill="#0344cb"/>
</g>
<defs>
<clipPath id="clip0_1137_10909">
<rect width="24" height="24" fill="#0344cb"/>
</clipPath>
</defs>
</svg>

		</button>
		<button class="delete-btn" onclick="deleteResume(${index})">
		
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7 4C7 3.46957 7.21071 2.96086 7.58579 2.58579C7.96086 2.21071 8.46957 2 9 2H15C15.5304 2 16.0391 2.21071 16.4142 2.58579C16.7893 2.96086 17 3.46957 17 4V6H21C21.2652 6 21.5196 6.10536 21.7071 6.29289C21.8946 6.48043 22 6.73478 22 7C22 7.26522 21.8946 7.51957 21.7071 7.70711C21.5196 7.89464 21.2652 8 21 8H19.931L19.064 20.142C19.0281 20.6466 18.8023 21.1188 18.4321 21.4636C18.0619 21.8083 17.5749 22 17.069 22H6.93C6.42414 22 5.93707 21.8083 5.56688 21.4636C5.1967 21.1188 4.97092 20.6466 4.935 20.142L4.07 8H3C2.73478 8 2.48043 7.89464 2.29289 7.70711C2.10536 7.51957 2 7.26522 2 7C2 6.73478 2.10536 6.48043 2.29289 6.29289C2.48043 6.10536 2.73478 6 3 6H7V4ZM9 6H15V4H9V6ZM6.074 8L6.931 20H17.07L17.927 8H6.074ZM10 10C10.2652 10 10.5196 10.1054 10.7071 10.2929C10.8946 10.4804 11 10.7348 11 11V17C11 17.2652 10.8946 17.5196 10.7071 17.7071C10.5196 17.8946 10.2652 18 10 18C9.73478 18 9.48043 17.8946 9.29289 17.7071C9.10536 17.5196 9 17.2652 9 17V11C9 10.7348 9.10536 10.4804 9.29289 10.2929C9.48043 10.1054 9.73478 10 10 10ZM14 10C14.2652 10 14.5196 10.1054 14.7071 10.2929C14.8946 10.4804 15 10.7348 15 11V17C15 17.2652 14.8946 17.5196 14.7071 17.7071C14.5196 17.8946 14.2652 18 14 18C13.7348 18 13.4804 17.8946 13.2929 17.7071C13.1054 17.5196 13 17.2652 13 17V11C13 10.7348 13.1054 10.4804 13.2929 10.2929C13.4804 10.1054 13.7348 10 14 10Z" fill="#e20022"/>
</svg>

		</button>
		<a href="${resume.template}" target="_blank" class="view-btn btn"  onclick="selectResume(${index})">
			
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path class="first-path" d="M12.0002 19.3969C14.6512 19.3969 16.8002 17.2478 16.8002 14.5969C16.8002 11.9459 14.6512 9.79688 12.0002 9.79688C9.34923 9.79688 7.2002 11.9459 7.2002 14.5969C7.2002 17.2478 9.34923 19.3969 12.0002 19.3969Z" fill="#cfaf00"/>
<path d="M22.8002 14.6C22.8002 14.6 21.6002 5 12.0002 5C2.4002 5 1.2002 14.6 1.2002 14.6" stroke="#cfaf00" stroke-width="2"/>
</svg>

		</a>
	</div>
    </div>
	<div class="skills d-none">
		<h6 class="skills-head">Skills</h6>
		<ul>${skillsHtml}</ul>
	</div>
	<div class="address d-none">${resume.address ? resume.address : 'N/A'}</div>
</div>`;

            savedResumesDiv.appendChild(resumeDiv);
        });

        // If there already have resume data
        const savedResumeDiv = document.querySelector('.all-saved-resume')
        const resumeForm = document.getElementById('qbox-container')
        if (resumes.length) {
            savedResumeDiv.classList.remove('d-none')
            resumeForm.classList.add('d-none')
        } else {
            savedResumeDiv.classList.add('d-none')
            resumeForm.classList.remove('d-none');
            document.getElementById('create-new-resume').classList.add('d-none');
        }
    }

    window.editResume = function (index) {

        // If user click on edit resume button
        const savedResumeDiv = document.querySelector('.all-saved-resume');
        const resumeForm = document.getElementById('qbox-container');
        savedResumeDiv.classList.add('d-none');
        resumeForm.classList.remove('d-none');
        document.getElementById('create-new-resume').classList.add('d-none');
        document.getElementById('back-all-resume').classList.remove('d-none');

        const resumes = JSON.parse(localStorage.getItem('resumes')) || [];
        const resume = resumes[index];
        document.getElementById('picture').src = resume.photo ? resume.photo : 'front-assets/images/resume-img/resume-default-img.svg';
        document.getElementById('base64').value = resume.photo; // showing base64 code in a input to set previous image as it is
        document.getElementById('picture').style.display = 'block';
        document.getElementById('name').value = resume.name;
        document.getElementById('email').value = resume.email;
        document.getElementById('phone').value = resume.phone;
        document.getElementById('address').value = resume.address;
        document.getElementById('jobTitle').value = resume.jobTitle;
        document.getElementById('aboutMe').value = resume.aboutMe;
        document.getElementById('websiteLink').value = resume.websiteLink;

        clearAdditionalFields(true);

        resume.experiences.forEach(exp => {
            addExperienceField(exp.title, exp.company, exp.city, exp.state, exp.from, exp.to, exp.description);
        });
        resume.educations.forEach(edu => {
            addEducationField(edu.field, edu.degree, edu.school, edu.location, edu.description, edu.from, edu.to);
        });

        resume.socials.forEach(social => {
            addSocialField(social.name, social.link);
        });

        const skillsList = document.getElementById('skillsList');
        skillsList.innerHTML = '';
        resume.skills.forEach(skill => {
            const skillItem = document.createElement('li');
            skillItem.className = 'skill-item';
            skillItem.innerHTML = `${skill} <button type="button" onclick="editSkill(${index}, '${skill}')"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button><button type="button" onclick="deleteSkill(${index}, '${skill}')"><svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button>`;
            skillsList.appendChild(skillItem);
        });

        const languagesList = document.getElementById('languagesList');
        languagesList.innerHTML = '';
        resume.languages.forEach(language => {
            const languageItem = document.createElement('li');
            languageItem.className = 'language-item';
            languageItem.innerHTML = `${language} <button type="button" onclick="editLanguage(${index}, '${language}')"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button><button type="button" onclick="deleteLanguage(${index}, '${language}')"><svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button>`;
            languagesList.appendChild(languageItem);
        });

        var allTemplates = document.querySelectorAll('.templatesDiv input')
        for (var i = 1; i <= allTemplates.length; i++) {
            document.getElementById('template' + i).checked = "false";
        }
        document.getElementById(resume.template).checked = "true"

        // document.getElementById('template').value = resume.template;
        resumeIndexField.value = index;
        saveButton.textContent = 'Update Resume';
    };


    window.deleteResume = function (index) {
        // Store the index in a temporary variable or dataset for later access
        const deleteModal = document.getElementById('warningResumeModal');
        deleteModal.setAttribute('data-delete-index', index);

        // Show the modal
        const modal = new bootstrap.Modal(deleteModal);
        modal.show();

        // Add an event listener to the "Yes, Delete" button
        const yesButton = deleteModal.querySelector('.yes-btn');
        yesButton.onclick = function () {
            // Retrieve the index from the modal attribute
            const deleteIndex = parseInt(deleteModal.getAttribute('data-delete-index'), 10);

            // Proceed with deletion logic
            const resumes = JSON.parse(localStorage.getItem('resumes')) || [];
            resumes.splice(deleteIndex, 1);
            localStorage.setItem('resumes', JSON.stringify(resumes));

            // Refresh the display
            displaySavedResumes();

            // Hide the modal after deletion
            modal.hide();
        };
    };



    window.selectResume = function (index) {
        localStorage.setItem("toView", index);
    };


    window.editSkill = function (resumeIndex, skill) {
        const newSkill = prompt("Edit Skill:", skill);
        if (newSkill !== null && newSkill.trim() !== "") {
            const resumes = JSON.parse(localStorage.getItem('resumes')) || [];
            const resume = resumes[resumeIndex];
            const skillIndex = resume.skills.indexOf(skill);
            if (skillIndex > -1) {
                resume.skills[skillIndex] = newSkill;
                localStorage.setItem('resumes', JSON.stringify(resumes));

                // Update the button's content in the UI
                updateSkillList(resumeIndex, skill, newSkill);
            }
        }
    };

    // Function to refresh the button or DOM dynamically
    function updateSkillList(resumeIndex, oldSkill, newSkill) {
        // Find the button element using querySelector or any selector logic
        const button = document.querySelector(
            `button[onclick="editSkill(${resumeIndex}, '${oldSkill}')"]`
        );
        if (button) {
            // Update the button's content or attributes dynamically
            button.parentElement.innerHTML = `${newSkill} <button type="button" onclick="editSkill(${resumeIndex}, '${newSkill}')"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button><button type="button" onclick="deleteSkill(${resumeIndex}, '${newSkill}')"><svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button>`
        }
    }



    window.deleteSkill = function (resumeIndex, skill) {
        // Reference the modal element
        const deleteModal = document.getElementById('warningSkillModal');

        // Store the resumeIndex and skill in data attributes for later use
        deleteModal.setAttribute('data-resume-index', resumeIndex);
        deleteModal.setAttribute('data-skill', skill);

        // Show the modal using Bootstrap
        const modal = new bootstrap.Modal(deleteModal);
        modal.show();

        // Add an event listener to the "Yes, Delete" button
        const yesButton = deleteModal.querySelector('.yes-btn');
        yesButton.onclick = function () {
            // Retrieve the data attributes
            const storedResumeIndex = parseInt(deleteModal.getAttribute('data-resume-index'), 10);
            const storedSkill = deleteModal.getAttribute('data-skill');

            // Proceed with deletion logic
            const resumes = JSON.parse(localStorage.getItem('resumes')) || [];
            const resume = resumes[storedResumeIndex];
            const skillIndex = resume.skills.indexOf(storedSkill);
            if (skillIndex > -1) {
                // Remove the skill from the array
                resume.skills.splice(skillIndex, 1);
                localStorage.setItem('resumes', JSON.stringify(resumes));

                // Remove the button (or parent element) associated with the skill
                const skillButton = document.querySelector(
                    `button[onclick="deleteSkill(${resumeIndex}, '${storedSkill}')"]`
                );
                if (skillButton) {
                    skillButton.parentElement.remove(); // Remove the parent element
                }
            }

            // Hide the modal after deletion
            modal.hide();
        };
    };




    window.editLanguage = function (resumeIndex, language) {
        const newLanguage = prompt("Edit language:", language);
        if (newLanguage !== null && newLanguage.trim() !== "") {
            const resumes = JSON.parse(localStorage.getItem('resumes')) || [];
            const resume = resumes[resumeIndex];
            const languageIndex = resume.languages.indexOf(language);
            if (languageIndex > -1) {
                resume.languages[languageIndex] = newLanguage;
                localStorage.setItem('resumes', JSON.stringify(resumes));

                // Update the button's content in the UI
                updateLanguageList(resumeIndex, language, newLanguage);
            }
        }
    };

    // Function to refresh the button or DOM dynamically
    function updateLanguageList(resumeIndex, oldLanguage, newLanguage) {
        // Find the button element using querySelector or any selector logic
        const button = document.querySelector(
            `button[onclick="editLanguage(${resumeIndex}, '${oldLanguage}')"]`
        );
        if (button) {
            // Update the button's content or attributes dynamically
            button.parentElement.innerHTML = `${newLanguage} <button type="button" onclick="editLanguage(${resumeIndex}, '${newLanguage}')"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button><button type="button" onclick="deleteLanguage(${resumeIndex}, '${newLanguage}')"><svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button>`
        }
    }

    window.deleteLanguage = function (resumeIndex, language) {
        // Reference the modal element
        const deleteModal = document.getElementById('warningSkillModal');

        // Store the resumeIndex and language in data attributes for later use
        deleteModal.setAttribute('data-resume-index', resumeIndex);
        deleteModal.setAttribute('data-language', language);

        // Show the modal using Bootstrap
        const modal = new bootstrap.Modal(deleteModal);
        modal.show();

        // Add an event listener to the "Yes, Delete" button
        const yesButton = deleteModal.querySelector('.yes-btn');
        yesButton.onclick = function () {
            // Retrieve the data attributes
            const storedResumeIndex = parseInt(deleteModal.getAttribute('data-resume-index'), 10);
            const storedLanguage = deleteModal.getAttribute('data-language');

            // Proceed with deletion logic
            const resumes = JSON.parse(localStorage.getItem('resumes')) || [];
            const resume = resumes[storedResumeIndex];
            const languageIndex = resume.languages.indexOf(storedLanguage);
            if (languageIndex > -1) {
                // Remove the language from the array
                resume.languages.splice(languageIndex, 1);
                localStorage.setItem('resumes', JSON.stringify(resumes));

                // Remove the button (or parent element) associated with the language
                const languageButton = document.querySelector(
                    `button[onclick="deleteLanguage(${resumeIndex}, '${storedLanguage}')"]`
                );
                if (languageButton) {
                    languageButton.parentElement.remove(); // Remove the parent element
                }
            }

            // Hide the modal after deletion
            modal.hide();
        };
    };


    window.addExperienceField = function (title = '', company = '', city = '', state = '', from = '', to = '', description = '') {
        const experienceFields = document.getElementById('experienceFields');
        const newField = document.createElement('div');
        newField.className = 'experience commonAccess';
        newField.innerHTML = `<div class="container-fluid custom-container pb-0">
        <div class="addition-field-delete-btn">
        <p>Details</p>
        <button type="button" onclick="confirmAndRemove(this)">
<svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7 4C7 3.46957 7.21071 2.96086 7.58579 2.58579C7.96086 2.21071 8.46957 2 9 2H15C15.5304 2 16.0391 2.21071 16.4142 2.58579C16.7893 2.96086 17 3.46957 17 4V6H21C21.2652 6 21.5196 6.10536 21.7071 6.29289C21.8946 6.48043 22 6.73478 22 7C22 7.26522 21.8946 7.51957 21.7071 7.70711C21.5196 7.89464 21.2652 8 21 8H19.931L19.064 20.142C19.0281 20.6466 18.8023 21.1188 18.4321 21.4636C18.0619 21.8083 17.5749 22 17.069 22H6.93C6.42414 22 5.93707 21.8083 5.56688 21.4636C5.1967 21.1188 4.97092 20.6466 4.935 20.142L4.07 8H3C2.73478 8 2.48043 7.89464 2.29289 7.70711C2.10536 7.51957 2 7.26522 2 7C2 6.73478 2.10536 6.48043 2.29289 6.29289C2.48043 6.10536 2.73478 6 3 6H7V4ZM9 6H15V4H9V6ZM6.074 8L6.931 20H17.07L17.927 8H6.074ZM10 10C10.2652 10 10.5196 10.1054 10.7071 10.2929C10.8946 10.4804 11 10.7348 11 11V17C11 17.2652 10.8946 17.5196 10.7071 17.7071C10.5196 17.8946 10.2652 18 10 18C9.73478 18 9.48043 17.8946 9.29289 17.7071C9.10536 17.5196 9 17.2652 9 17V11C9 10.7348 9.10536 10.4804 9.29289 10.2929C9.48043 10.1054 9.73478 10 10 10ZM14 10C14.2652 10 14.5196 10.1054 14.7071 10.2929C14.8946 10.4804 15 10.7348 15 11V17C15 17.2652 14.8946 17.5196 14.7071 17.7071C14.5196 17.8946 14.2652 18 14 18C13.7348 18 13.4804 17.8946 13.2929 17.7071C13.1054 17.5196 13 17.2652 13 17V11C13 10.7348 13.1054 10.4804 13.2929 10.2929C13.4804 10.1054 13.7348 10 14 10Z" fill="#e20022"></path>
</svg>
</button>
        </div>
    <div class="row contact_formInputs">
        <div class="col-12 col-md-6 mb-4">
            <label for="name">Position Title <span>*</span></label>
            <input type="text" class="form-control validationClass" value="${title}" name="experienceTitle[]" id="name" placeholder="Web Designer, Computer Operator">
        </div>
        <div class="col-12 col-md-6  mb-4">
            <label for="companyName">Company Name <span>*</span></label>
            <input type="text" class="form-control validationClass" value="${company}" name="experienceCompany[]"
                id="companyName" placeholder="Company Name">
        </div>

        <div class="col-12 col-md-6 mb-4">
            <label for="CompanyCity">City <span>*</span></label>
            <input type="text" class="form-control validationClass" value="${city}" name="experienceCity[]"
                id="CompanyCity" placeholder="City">
        </div>
        <div class="col-12 col-md-6  mb-4">
            <label for="companySatate">State <span>*</span></label>
            <input type="tel" class="form-control validationClass" value="${state}" name="experienceState[]"
                id="companySatate" placeholder="State">
        </div>
        <div class="col-12 mb-4">
            <label for="workSummary">Work Summary</label>
            <textarea value="${description}" name="experienceDescription[]" id="workSummary" class="form-control"
                placeholder="Work Summary">${description}</textarea>
        </div>
        <div class="col-12 col-md-6 mb-4">
            <label for="startDate">Start Date <span>*</span></label>
            <input type="month" class="form-control validationClass" value="${from}" name="experienceFrom[]"
                id="startDate" placeholder="Start Date">
        </div>
        <div class="col-12 col-md-6  mb-4">
            <label for="endDate">End Date</label>
            <input type="month" class="form-control" value="${to}" name="experienceTo[]" id="endDate" placeholder="End Date">
              <label for="currentlyWork" class="mt-2 d-flex align-items-center gap-1">
                                        ( If no date is selected, it means I currently work here.)
                                        </label>
        </div>
    </div>
</div>`;
        experienceFields.appendChild(newField);
    };

    window.addEducationField = function (field = '', degree = '', school = '', location = '', description = '', from = '', to = '') {
        const educationFields = document.getElementById('educationFields');
        const newField = document.createElement('div');
        newField.className = 'education commonAccess';
        newField.innerHTML = `

<div class="container-fluid custom-container pb-0">
<div class="addition-field-delete-btn">
        <p>Details</p>
        <button type="button" onclick="confirmAndRemove(this)">
<svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7 4C7 3.46957 7.21071 2.96086 7.58579 2.58579C7.96086 2.21071 8.46957 2 9 2H15C15.5304 2 16.0391 2.21071 16.4142 2.58579C16.7893 2.96086 17 3.46957 17 4V6H21C21.2652 6 21.5196 6.10536 21.7071 6.29289C21.8946 6.48043 22 6.73478 22 7C22 7.26522 21.8946 7.51957 21.7071 7.70711C21.5196 7.89464 21.2652 8 21 8H19.931L19.064 20.142C19.0281 20.6466 18.8023 21.1188 18.4321 21.4636C18.0619 21.8083 17.5749 22 17.069 22H6.93C6.42414 22 5.93707 21.8083 5.56688 21.4636C5.1967 21.1188 4.97092 20.6466 4.935 20.142L4.07 8H3C2.73478 8 2.48043 7.89464 2.29289 7.70711C2.10536 7.51957 2 7.26522 2 7C2 6.73478 2.10536 6.48043 2.29289 6.29289C2.48043 6.10536 2.73478 6 3 6H7V4ZM9 6H15V4H9V6ZM6.074 8L6.931 20H17.07L17.927 8H6.074ZM10 10C10.2652 10 10.5196 10.1054 10.7071 10.2929C10.8946 10.4804 11 10.7348 11 11V17C11 17.2652 10.8946 17.5196 10.7071 17.7071C10.5196 17.8946 10.2652 18 10 18C9.73478 18 9.48043 17.8946 9.29289 17.7071C9.10536 17.5196 9 17.2652 9 17V11C9 10.7348 9.10536 10.4804 9.29289 10.2929C9.48043 10.1054 9.73478 10 10 10ZM14 10C14.2652 10 14.5196 10.1054 14.7071 10.2929C14.8946 10.4804 15 10.7348 15 11V17C15 17.2652 14.8946 17.5196 14.7071 17.7071C14.5196 17.8946 14.2652 18 14 18C13.7348 18 13.4804 17.8946 13.2929 17.7071C13.1054 17.5196 13 17.2652 13 17V11C13 10.7348 13.1054 10.4804 13.2929 10.2929C13.4804 10.1054 13.7348 10 14 10Z" fill="#e20022"></path>
</svg>
</button>
        </div>
    <div class="row contact_formInputs">
        <div class="col-12 col-md-6 mb-4">
            <label for="collageName">School / Collage Name <span>*</span></label>
            <input type="text" class="form-control validationClass" placeholder="School / Collage Name" value="${school}" name="educationSchool[]"
                id="collageName">
        </div>
        <div class="col-12 col-md-6 mb-4">
            <label for="schoolLocation">School/Collage Location <span>*</span></label>
            <input type="text" class="form-control validationClass" placeholder="School/Collage Location" value="${location}" name="educationLocation[]"
                id="schoolLocation">
        </div>
        <div class="col-12 col-md-6 mb-4">
            <label for="educationField">Field of Study <span>*</span></label>
            <input type="text" class="form-control validationClass" placeholder="Field of Study" value="${field}" name="educationField[]"
                id="educationField">
        </div>
        <div class="col-12 col-md-6 mb-4">
            <label for="educationDegree">Degree <span>*</span></label>
            <input type="text" class="form-control validationClass" placeholder="Degree" value="${degree}" name="educationDegree[]"
                id="educationDegree">
        </div>
        <div class="col-12 col-md-6 mb-4">
            <label for="startDate">Start Date <span>*</span></label>
            <input type="month" class="form-control validationClass" placeholder="Start Date" value="${from}" name="educationFrom[]"
                id="startDate">
        </div>
        <div class="col-12 col-md-6  mb-4">
            <label for="endDate">End Date</label>
            <input type="month" class="form-control" placeholder="End Date" value="${to}" name="educationTo[]" id="endDate">
        </div>

        <div class="col-12 mb-4">
            <label for="educationSummary">Description</label>
            <textarea value="${description}" name="educationDescription[]" id="educationSummary" class="form-control"
                placeholder="Description">${description}</textarea>
        </div>
    </div>
</div>
        `;
        educationFields.appendChild(newField);
    };

    window.addSocialField = function (name = '', link = '') {
        const socialFields = document.getElementById('socialFields');

        const newField = document.createElement('div');
        newField.className = 'socialFields commonAccess';
        newField.innerHTML = `
        <div class="container-fluid custom-container py-0">
        <div class="addition-field-delete-btn">
        <p>Details</p>
        <button type="button" onclick="confirmAndRemove(this)">
<svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7 4C7 3.46957 7.21071 2.96086 7.58579 2.58579C7.96086 2.21071 8.46957 2 9 2H15C15.5304 2 16.0391 2.21071 16.4142 2.58579C16.7893 2.96086 17 3.46957 17 4V6H21C21.2652 6 21.5196 6.10536 21.7071 6.29289C21.8946 6.48043 22 6.73478 22 7C22 7.26522 21.8946 7.51957 21.7071 7.70711C21.5196 7.89464 21.2652 8 21 8H19.931L19.064 20.142C19.0281 20.6466 18.8023 21.1188 18.4321 21.4636C18.0619 21.8083 17.5749 22 17.069 22H6.93C6.42414 22 5.93707 21.8083 5.56688 21.4636C5.1967 21.1188 4.97092 20.6466 4.935 20.142L4.07 8H3C2.73478 8 2.48043 7.89464 2.29289 7.70711C2.10536 7.51957 2 7.26522 2 7C2 6.73478 2.10536 6.48043 2.29289 6.29289C2.48043 6.10536 2.73478 6 3 6H7V4ZM9 6H15V4H9V6ZM6.074 8L6.931 20H17.07L17.927 8H6.074ZM10 10C10.2652 10 10.5196 10.1054 10.7071 10.2929C10.8946 10.4804 11 10.7348 11 11V17C11 17.2652 10.8946 17.5196 10.7071 17.7071C10.5196 17.8946 10.2652 18 10 18C9.73478 18 9.48043 17.8946 9.29289 17.7071C9.10536 17.5196 9 17.2652 9 17V11C9 10.7348 9.10536 10.4804 9.29289 10.2929C9.48043 10.1054 9.73478 10 10 10ZM14 10C14.2652 10 14.5196 10.1054 14.7071 10.2929C14.8946 10.4804 15 10.7348 15 11V17C15 17.2652 14.8946 17.5196 14.7071 17.7071C14.5196 17.8946 14.2652 18 14 18C13.7348 18 13.4804 17.8946 13.2929 17.7071C13.1054 17.5196 13 17.2652 13 17V11C13 10.7348 13.1054 10.4804 13.2929 10.2929C13.4804 10.1054 13.7348 10 14 10Z" fill="#e20022"></path>
</svg>
</button>
        </div>
                            <div class="row contact_formInputs">
                                <div class="col-12 col-md-6  mb-4">
                                    <label for="socialName">Social Name</label>
                                    <input type="text" class="form-control" placeholder="Social Name" value="${name}" name="socialName[]" id="socialName">
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="socialLink">Social Link</label>
                                    <input type="text" class="form-control" placeholder="Social Link" value="${link}" name="socialLink[]" id="socialLink">
                                </div>
                            </div>
        </div>
        `;
        socialFields.appendChild(newField);
    };

    window.addSkill = function () {
        const skillInput = document.getElementById('skillInput');
        const skill = skillInput.value.trim();
        if (skill) {
            const skillsList = document.getElementById('skillsList');
            const skillItem = document.createElement('li');
            skillItem.className = 'skill-item';
            skillItem.innerHTML = `${skill} <button type="button" onclick="editSkillInline(this)"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button> <button onclick="deleteSkillInline(this)"> <svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button>`;
            skillsList.appendChild(skillItem);
            skillInput.value = '';
        }
    };

    window.editSkillInline = function (button) {
        const skillItem = button.parentNode;
        const skill = skillItem.firstChild.textContent.trim();
        const newSkill = prompt("Edit Skill:", skill);
        if (newSkill !== null && newSkill.trim() !== "") {
            skillItem.innerHTML = `${newSkill} <button type="button" onclick="editSkillInline(this)"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button> <button onclick="deleteSkillInline(this)"> <svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button>`;
        }
    };

    window.deleteSkillInline = function (button) {
        const skillItem = button.parentNode;
        skillItem.parentNode.removeChild(skillItem);
    };


    window.addLanguage = function () {
        const languageInput = document.getElementById('languageInput');
        const language = languageInput.value.trim();
        if (language) {
            const languagesList = document.getElementById('languagesList');
            const languageItem = document.createElement('li');
            languageItem.className = 'language-item';
            languageItem.innerHTML = `${language} <button type="button" onclick="editLanguageInline(this)"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button> <button onclick="deleteLanguageInline(this)"> <svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button>`;
            languagesList.appendChild(languageItem);
            languageInput.value = '';
        }
    };

    window.editLanguageInline = function (button) {
        const languageItem = button.parentNode;
        const language = languageItem.firstChild.textContent.trim();
        const newLanguage = prompt("Edit language:", language);
        if (newLanguage !== null && newLanguage.trim() !== "") {
            languageItem.innerHTML = `${newLanguage} <button type="button" onclick="editLanguageInline(this)"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17.8558V20.3144C1 20.4962 1.07223 20.6706 1.20081 20.7992C1.32938 20.9278 1.50377 21 1.6856 21H4.14416C4.32564 21 4.4997 20.928 4.62819 20.7998L16.2834 9.14462L12.8554 5.71663L1.20019 17.3718C1.07203 17.5003 1.00004 17.6744 1 17.8558ZM15.521 3.05102L18.949 6.47901L20.5985 4.82946C20.8556 4.57232 21 4.22362 21 3.86003C21 3.49643 20.8556 3.14773 20.5985 2.89059L19.1094 1.40147C18.8523 1.14441 18.5036 1 18.14 1C17.7764 1 17.4277 1.14441 17.1705 1.40147L15.521 3.05102Z" stroke="#070026" /></svg></button> <button onclick="deleteLanguageInline(this)"> <svg width="16" height="18" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 4.5L16.88 14.525C16.722 17.086 16.643 18.367 16 19.288C15.6826 19.7432 15.2739 20.1273 14.8 20.416C13.843 21 12.56 21 9.994 21C7.424 21 6.139 21 5.18 20.415C4.70589 20.1257 4.29721 19.7409 3.98 19.285C3.338 18.363 3.26 17.08 3.106 14.515L2.5 4.5M1 4.5H19M14.056 4.5L13.373 3.092C12.92 2.156 12.693 1.689 12.302 1.397C12.2151 1.33232 12.1232 1.27479 12.027 1.225C11.594 1 11.074 1 10.035 1C8.969 1 8.436 1 7.995 1.234C7.89752 1.28621 7.80453 1.34642 7.717 1.414C7.322 1.717 7.101 2.202 6.659 3.171L6.053 4.5M7.5 15.5V9.5M12.5 15.5V9.5" stroke="#dc3545" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /></svg></button>`;
        }
    };

    window.deleteLanguageInline = function (button) {
        const languageItem = button.parentNode;
        languageItem.parentNode.removeChild(languageItem);
    };


    function clearAdditionalFields(isEditMode) {
        const experienceFields = document.getElementById('experienceFields');
        const educationFields = document.getElementById('educationFields');
        const socialFields = document.getElementById('socialFields');

        experienceFields.innerHTML = `<section class="hero-main-section"> <div class="container-fluid custom-container pb-0"><div class="row d-lg-flex align-items-center"><div class="col-12"><h1 class="resume-head">Professional Experience</h1><p class="resume-head-para">Tell us about your most recent job.</p></div></div></div></section>`;
        educationFields.innerHTML = `<section class="hero-main-section"> <div class="container-fluid custom-container pb-0"><div class="row d-lg-flex align-items-center"><div class="col-12"><h1 class="resume-head">Education</h1><p class="resume-head-para">Add your most relevant education, including programs you're currently enrolled in.</p></div></div></div></section>`;
        socialFields.innerHTML = `<section class="hero-main-section"> <div class="container-fluid custom-container"><div class="row d-lg-flex align-items-center"><div class="col-12"><h1 class="resume-head">Social Links</h1><p class="resume-head-para">Add your social link here</p></div></div></div></section>`;

        if (!isEditMode) {
            addExperienceField();
            addEducationField();
            addSocialField();
        }
    }

    displaySavedResumes();

    // Create new resume on click
    const createNewResumeBtn = document.getElementById('create-new-resume');
    createNewResumeBtn.addEventListener('click', function (e) {
        this.classList.add('d-none')
        document.getElementById('qbox-container').classList.remove('d-none');
        document.querySelector('.all-saved-resume').classList.add('d-none');
        document.getElementById('back-all-resume').classList.remove('d-none');
    })


    // Create new resume on click
    const backToResumeBtn = document.getElementById('back-all-resume');
    backToResumeBtn.addEventListener('click', function (e) {
        window.location.reload();
    })
});


