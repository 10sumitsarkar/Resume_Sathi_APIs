<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}"
        alt="W3CoderSchool Logo">
    <title>My Resume</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <meta name="description" content="My resume gennerated">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: "Montserrat", sans-serif;
        }

        body {
            background: #f4f4f4;
            font-size: 14px;
            line-height: 22px;
            color: #555555;
        }

        .bold {
            font-weight: 700;
            font-size: 20px;
            text-transform: uppercase;
        }

        .semi-bold {
            font-weight: 500;
            font-size: 16px;
        }

        .resume {
            width: 800px;
            min-height: 1125px;
            display: flex;
            margin: 50px auto;
            border-radius: 5px;
        }

        .resume .resume_left {
            width: 280px;
            background: #0bb5f4;
        }

        .resume .resume_left .resume_profile {
            width: 230px;
            height: auto;
            margin-inline: auto;
            margin-top: 25px;
        }

        .resume .resume_left .resume_profile img {
            width: 100%;
            height: 100%;
        }

        .resume .resume_left .resume_content {
            padding: 0 25px;
        }

        .resume .title {
            margin-bottom: 20px;
        }

        .resume .resume_left .bold {
            color: #fff;
        }

        .resume .resume_left .regular {
            color: #b1eaff;
        }

        .resume .resume_item {
            padding: 25px 0;
            border-bottom: 2px solid #b1eaff;
        }

        .resume .resume_left .resume_item:last-child,
        .resume .resume_right .resume_item:last-child {
            border-bottom: 0px;
        }

        .resume .resume_left ul li {
            display: flex;
            margin-bottom: 10px;
            align-items: center;
        }

        .resume .resume_left ul li:last-child {
            margin-bottom: 0;
        }

        .resume .resume_left ul li .icon {
            width: 35px;
            height: 35px;
            background: #fff;
            color: #0bb5f4;
            border-radius: 50%;
            margin-right: 10px;
            font-size: 16px;
            position: relative;
        }

        .resume .icon i,
        .resume .resume_right .resume_hobby ul li i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .resume .resume_left ul li .data {
            color: #b1eaff;
        }

        .resume .resume_left .resume_skills ul li {
            display: flex;
            margin-bottom: 10px;
            color: #b1eaff;
            justify-content: space-between;
            align-items: center;
        }

        .resume .resume_left .resume_skills ul li .skill_name {
            width: 25%;
        }

        .resume .resume_left .resume_skills ul li .skill_progress {
            width: 60%;
            margin: 0 5px;
            height: 5px;
            background: #009fd9;
            position: relative;
        }

        .resume .resume_left .resume_skills ul li .skill_per {
            width: 15%;
        }

        .resume .resume_left .resume_skills ul li .skill_progress span {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: #fff;
        }

        .resume .resume_left .resume_social .semi-bold {
            color: #fff;
            margin-bottom: 3px;
        }

        .experience-school-title {
            color: #420080;
        }

        .company-school-name {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 5px
        }

        .company-school-desc {
            color: #666;
            margin-top: 10px
        }

        .resume .resume_right {
            width: 520px;
            background: #fff;
            padding: 25px;
        }

        .resume .resume_right .bold {
            color: #0bb5f4;
        }

        .resume .resume_right .resume_work ul,
        .resume .resume_right .resume_education ul {
            padding-left: 40px;
            overflow: hidden;
        }

        .resume .resume_right ul li {
            position: relative;
        }

        .resume .resume_right ul li .date {
            color: #004873;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 15px;
            font-weight: 500
        }

        .resume .resume_right ul li .info {
            margin-bottom: 20px;
        }

        .resume .resume_right ul li:last-child .info {
            margin-bottom: 0;
        }

        .resume .resume_right .resume_work ul li:before,
        .resume .resume_right .resume_education ul li:before {
            content: "";
            position: absolute;
            top: 5px;
            left: -25px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            border: 2px solid #0bb5f4;
        }

        .resume .resume_right .resume_work ul li:after,
        .resume .resume_right .resume_education ul li:after {
            content: "";
            position: absolute;
            top: 14px;
            left: -21px;
            width: 2px;
            height: 100%;
            background: #0bb5f4;
        }

        .resume .resume_right .resume_hobby ul {
            display: flex;
            justify-content: space-between;
        }

        .resume .resume_right .resume_hobby ul li {
            width: 80px;
            height: 80px;
            border: 2px solid #0bb5f4;
            border-radius: 50%;
            position: relative;
            color: #0bb5f4;
        }

        .resume .resume_right .resume_hobby ul li i {
            font-size: 30px;
        }

        .resume .resume_right .resume_hobby ul li:before {
            content: "";
            position: absolute;
            top: 40px;
            right: -52px;
            width: 50px;
            height: 2px;
            background: #0bb5f4;
        }

        .resume .resume_right .resume_hobby ul li:last-child:before {
            display: none;
        }

        .social-link {
            color: #bfeeff;
            text-decoration: none
        }

        .social-link:hover {
            color: #fff;
        }

        ul.resumelanguage {
            padding-left: 40px
        }


        ul.resumelanguage .language_name {
            font-size: 16px;
        }

        ul.resumelanguage li:before {
            content: "";
            position: absolute;
            top: 5px;
            left: -25px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            border: 2px solid #0bb5f4;
        }


        .print-button {
            position: sticky;
            top: 0;
            padding-block: 10px;
            border-radius: 5px;
            background: linear-gradient(90deg, #e8eaf1 -1%, #e8eaf1 2%, #ebecf0 98%);
            border-bottom: 2px solid #ffffff;
            box-shadow: 8px 7px 21px 0px rgba(0, 0, 0, 0.15), -6px -7px 11px 0px rgba(255, 255, 255, 0.84);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            z-index: 999;
            top: 0;

            button {
                font-size: 16px;
                font-weight: 600;
                color: var(--dark-blue);
                border-radius: 5px;
                background: linear-gradient(93deg, rgba(220, 221, 226, 0.90) 2.55%, #F1F1F1 30.47%, #F1F1F1 71.57%, rgba(220, 221, 226, 0.90) 97.45%);
                border: 2px solid #ffffff;
                box-shadow: -8px -8px 10px 0px #ffffff, 6px 5px 10px 3px rgba(54, 54, 54, 0.24);
                padding: 15px;
                cursor: pointer;
            }
        }
    </style>
</head>

<body>


    <div class="print-button">
        <button id="printPdfButton">Print to PDF</button>
        <button id="printImageButton">Print to Image</button>
    </div>
    <div class="resume" id="selectedResume">
        <div class="resume_left">
            <div class="resume_profile">
                <img loading="lazy" class="resume-photo" src="" alt="profile_pic">
            </div>
            <div class="resume_content">
                <div class="resume_item resume_info">
                    <div class="title">
                        <p class="bold resume-name">stephen colbert</p>
                        <p class="regular resume-job-title">Designer</p>
                    </div>
                    <ul>
                        <li>
                            <div>
                                <div class="icon">
                                    <i class="fas fa-map-signs"></i>
                                </div>
                            </div>
                            <div class="data resume-address">
                                21 Street, Texas <br /> USA
                            </div>
                        </li>
                        <li>
                            <div>
                                <div class="icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                            </div>
                            <div class="data resume-phone">
                                +324 4445678
                            </div>
                        </li>
                        <li>
                            <div>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="data resume-email">
                                stephen@gmail.com
                            </div>
                        </li>
                        <li>
                            <div>
                                <div class="icon">
                                    <i class="fab fa-weebly"></i>
                                </div>
                            </div>
                            <div class="data resume-website"></div>
                        </li>
                    </ul>
                </div>
                <div class="resume_item resume_skills">

                </div>
                <div class="resume_item resume_social">

                </div>
            </div>
        </div>
        <div class="resume_right">
            <div class="resume_item resume_about">
                <div class="title">
                    <p class="bold">About Me</p>
                </div>
                <p class="resume-about-me"></p>
            </div>
            <div class="resume_item resume_work">

            </div>
            <div class="resume_item resume_education">

            </div>
            <div class="resume_item resume_languages">

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <script>
        // Get resume index which need to view
        const resumesIndexToView = localStorage.getItem('toView');

        // Retrieve the data from localStorage
        const resumes = localStorage.getItem('resumes');

        // Parse the JSON string into a JavaScript object or array
        const parsedResumes = JSON.parse(resumes);

        // Specify the index you want to access
        const index = resumesIndexToView ? resumesIndexToView : '0'; // Change this to any index you want

        // Check if the index exists in the array
        if (parsedResumes && parsedResumes.length > index) {
            // Access the data at the specific index
            const resume = parsedResumes[index];

            // Now you can work with this specific resume's data
            document.querySelector('.resume-name').innerText = resume.name;
            document.querySelector('.resume-email').innerText = resume.email;
            document.querySelector('.resume-job-title').innerText = resume.jobTitle;
            document.querySelector('.resume-about-me').innerText = resume.aboutMe;
            document.querySelector('.resume-address').innerText = resume.address;
            document.querySelector('.resume-phone').innerText = resume.phone;
            document.querySelector('.resume-website').innerText = resume.websiteLink ? resume.websiteLink : 'No website';


            // Access education details
            if (resume.educations && resume.educations.length > 0) {
                let educationHtml = '';
                resume.educations.forEach(education => {
                    if (education.field && education.degree && education.school && education.location && education
                        .from) { // Ensure both name and link are present
                        educationHtml += `
           <li>
            <div class="date"><span>${education.from}</span> to <span>${education.to}</span></div>
            <div class="info">
              <p class="semi-bold experience-school-title">${education.field} (${education.degree})</p>
              <p class="company-school-name">${education.school}</p>
                <p class="company-school-address">${education.location}</p>
              <p class="company-school-desc">${education.description}</p>
            </div>
          </li>`;
                    }
                });

                // Only add the section if there are valid social links
                if (educationHtml) {
                    document.querySelector('.resume_education').innerHTML = `
        <div class="title">
          <p class="bold">Education</p>
        </div>
        <ul>
          ${educationHtml}          
        </ul>`;
                }
            }

            // Access experience details
            if (resume.experiences && resume.experiences.length > 0) {
                let experienceHtml = '';
                resume.experiences.forEach(experience => {
                    if (experience.title && experience.company && experience.city && experience.state && experience
                        .from) { // Ensure both name and link are present
                        experienceHtml += `
           <li>
            <div class="date"><span>${experience.from}</span> to <span>${experience.to ? experience.to : 'Currently working'}</span></div>
            <div class="info">
              <p class="semi-bold experience-school-title">${experience.title}</p>
               <p class="semi-bold company-school-name">${experience.company}</p>
               <p class="company-school-address">${experience.city}, ${experience.state}</p>
              <p class="company-school-desc">${experience.description}</p>
            </div>
          </li>`;
                    }

                });

                // Only add the section if there are valid social links
                if (experienceHtml) {
                    document.querySelector('.resume_work').innerHTML = `
        <div class="title">
          <p class="bold">Experience</p>
        </div>
        <ul>
          ${experienceHtml}          
        </ul>`;
                }
            }

            // Access skills
            if (resume.skills && resume.skills.length > 0) {
                // Build the HTML for the skills list
                let skillsHtml = '';
                resume.skills.forEach(skill => {
                    skillsHtml += `<li class="skill_name"><div class="skill_name">${skill}</div></li>`;
                });

                // Insert the skills into the document
                document.querySelector('.resume_skills').innerHTML = `
        <div class="title">
            <p class="bold">Skill's</p>
        </div>
        <ul class="resumeSkill">
            ${skillsHtml}
        </ul>`;
            }

            // Access social
            if (resume.socials && resume.socials.length > 0) {
                let socialHtml = '';
                resume.socials.forEach(social => {
                    if (social.name && social.link) { // Ensure both name and link are present
                        socialHtml += `
            <li class="social_item">
                <div class="icon">
                    ${getSocialIcon(social.name)}  <!-- Dynamically generate the icon -->
                </div>
                <div class="data">
                    <p class="semi-bold">${social.name}</p>
                    <p><a href="https://${social.link}" class="social-link target="_blank">${social.link}</a></p>
                </div>
            </li>`;
                    }
                });


                // Access languages
                if (resume.languages && resume.languages.length > 0) {
                    // Build the HTML for the languages list
                    let languagesHtml = '';
                    resume.languages.forEach(language => {
                        languagesHtml +=
                            `<li class="language_name"><div class="language_name">${language}</div></li>`;
                    });

                    // Insert the languages into the document
                    document.querySelector('.resume_languages').innerHTML = `
        <div class="title">
            <p class="bold">language's</p>
        </div>
        <ul class="resumelanguage">
            ${languagesHtml}
        </ul>`;
                }



                // Only add the section if there are valid social links
                if (socialHtml) {
                    document.querySelector('.resume_social').innerHTML = `
        <div class="title">
            <p class="bold">Social</p>
        </div>
        <ul class="resumeSocial">
            ${socialHtml}
        </ul>`;
                }
            }

            // Helper function to get the appropriate icon based on social network name
            function getSocialIcon(network) {
                switch (network.toLowerCase()) {
                    case 'facebook':
                        return '<i class="fab fa-facebook"></i>';
                    case 'twitter':
                        return '<i class="fab fa-twitter"></i>';
                    case 'linkedin':
                        return '<i class="fab fa-linkedin"></i>';
                    case 'instagram':
                        return '<i class="fab fa-instagram"></i>';
                        // Add more cases as needed for different social platforms
                    default:
                        return '<i class="fas fa-globe"></i>'; // Default icon for unknown networks
                }
            }

            // Access template
            console.log('Template:', resume.template);

            // Access photo
            document.querySelector('.resume-photo').src = resume.photo ? resume.photo :
                'front-assets/images/resume-img/resume-default-img.svg';
            document.querySelector('.resume-photo').style.objectFit = resume.photo ? 'cover' : 'contain';
        }


        // Print area


        const selectedResumeDiv = document.getElementById('selectedResume');
        const printPdfButton = document.getElementById('printPdfButton');
        const printImageButton = document.getElementById('printImageButton');

        printPdfButton.addEventListener('click', function() {
            const element = document.getElementById('selectedResume');
            const opt = {
                margin: -38, // Set margins to zero
                filename: 'resume.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                }, // Increase scale for better resolution
                jsPDF: {
                    unit: 'pt',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            html2pdf().from(element).set(opt).save();
        });

        printImageButton.addEventListener('click', function() {
            const element = document.getElementById('selectedResume');
            html2canvas(element).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.href = imgData;
                link.download = 'resume.png';
                link.click();
            });
        });
    </script>

    <script>
        // Select all span elements inside elements with the class 'date'
        const allDateInp = document.querySelectorAll(".date span");

        allDateInp.forEach((eachAllInp) => {
            // Get the text content from the span and trim any extra whitespace
            const monthInputValue = eachAllInp.textContent.trim();

            // Check if the span has text content
            if (monthInputValue !== '') {
                // Split the value into year and month (expected format: YYYY-MM)
                const [year, month] = monthInputValue.split('-');

                if (year && month) { // Ensure both year and month are defined
                    // Create a Date object using the selected year and month
                    const date = new Date(year, month - 1); // Month is 0-indexed

                    // Options for formatting the month name and year
                    const options = {
                        year: 'numeric',
                        month: 'short'
                    };

                    // Format the date to "Jan 2023"
                    const formattedDate = new Intl.DateTimeFormat('en-US', options).format(date);

                    // Set the formatted date as the text content of the span
                    eachAllInp.textContent = formattedDate;
                } else {
                    console.warn(`Invalid date format in span: ${monthInputValue}`);
                }
            } else {
                // If the span doesn't have text content, set it to "Till Now"
                eachAllInp.textContent = 'Till Now';
            }
        });
    </script>
</body>

</html>
