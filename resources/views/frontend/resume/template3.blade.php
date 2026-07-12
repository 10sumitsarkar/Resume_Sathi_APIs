<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}"
        alt="ResumeSathi Logo">
    <title>My Resume</title>
    <script src="https://kit.fontawesome.com/3ef3559250.js" crossorigin="anonymous"></script>
    <meta name="description" content="My resume gennerated">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Calligraffitti&family=Open+Sans:wght@400;700&display=swap");

        :root {
            --bg-clr: #6b7fba;
            --white: #fff;
            --rleft-bg: #9ab3eb;
            --rright-bg: #8096d0;
            --primary-text-clr: #525252;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: "Open Sans", sans-serif;
        }

        body {
            background: #f4f4f4;
            font-size: 12px;
            line-height: 20px;
            color: var(--primary-text-clr);
            padding: 0 20px;
        }

        h2 {
            font-family: "Calligraffitti", cursive;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 20px;
        }

        .resume {
            width: 800px;
            min-height: 1125px;
            display: flex;
            margin: 50px auto;
            border-radius: 5px;
            background: var(--white);
        }

        .resume .resume_left {
            width: 270px;
        }

        .resume .resume_right {
            background: var(--rright-bg);
            width: calc(800px - 270px);
        }

        .resume_right .r_namerole {
            width: 100%;
            height: auto;
            padding: 35px;
        }

        .resume_left .r_profile_pic {
            width: 270px;
            height: 270px;
            padding: 25px;
        }

        .resume_left .r_profile_pic {
            background: var(--rleft-bg);
        }

        .resume_left .r_profile_pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            overflow: hidden;
        }

        .resume_left .r_left_sub {
            padding: 35px;
        }

        .resume_left .r_left_sub>div:not(:last-child),
        .resume_right .r_right_sub>div:not(:last-child) {
            margin-bottom: 35px;
        }

        .resume_left .r_aboutme p {
            text-align: center;
        }

        .resume_left .r_skills ul li,
        .resume_left .r_skills ul li p:first-child,
        .resume_left .r_hobbies ul li p:first-child {
            display: flex;
            align-items: center;
        }

        .resume_left .r_skills ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .resume_left .r_skills ul li p:first-child,
        .resume_left .r_hobbies ul li p:first-child {
            width: 45px;
            height: 45px;
            background: var(--rleft-bg);
            margin-right: 15px;
            border-radius: 50%;
            justify-content: center;
            font-size: 14px;
            color: var(--white);
        }

        .resume_left .r_hobbies ul {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .resume_left .r_hobbies ul li {
            margin-bottom: 10px;
        }

        .resume_left .r_hobbies ul li p:hover {
            background: var(--rright-bg);
        }

        .resume_right .r_namerole p {
            font-family: "Calligraffitti", cursive;
            font-size: 60px;
            line-height: 80px;
            text-align: center;
        }

        .resume_right .r_namerole p:last-child {
            font-size: 18px;
            line-height: 24px;
            color: var(--white);
        }

        .resume_right .r_info {
            padding: 35px;
            background: var(--white);
        }

        .resume_right .r_info ul {
            display: flex;
            justify-content: space-between;
        }

        .resume_right .r_info p {
            font-weight: 700;
            font-size: 18px;
        }

        .resume_right .r_right_sub {
            padding: 35px;
            padding-bottom: 0;
        }

        .resume_right .r_right_sub p {
            color: var(--white);
        }

        .resume_right .r_right_sub ul li {
            display: flex;
            margin-bottom: 20px;
        }

        .resume_right .r_right_sub ul li div:first-child {
            width: 25%;
            margin-right: 15px;
        }

        .resume_right .r_right_sub ul li div:last-child {
            width: 75%;
        }

        .resume_right .r_right_sub p:first-child {
            font-size: 14px;
            margin-bottom: 5px;
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

        .languages {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px
        }

        .languages li {
            margin: 0 !important;
        }

        .languages div {
            width: 100% !important;
        }

        .languages p {
            font-size: 16px !important;
            background: #ffffff23;
            padding: 5px 10px;
            border-radius: 5px
        }
    </style>
</head>

<body>


    <div class="print-button">
        <button id="printPdfButton">Print to PDF</button>
        <button id="printImageButton">Print to Image</button>
    </div>


    <section class="resume" id="selectedResume">
        <div class="resume_left">
            <div class="r_profile_pic">
                <img src="https://i.imgur.com/x3omKbe.png" class="resume-photo" alt="profile_pic">
            </div>
            <div class="r_left_sub">
                <div class="r_aboutme">
                    <h2>About me</h2>
                    <p class="resume-about-me">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa earum
                        optio id iure reprehenderit accusamus quisquam accusantium nulla? Dolorum ipsa sed perspiciatis
                        nemo aliquam quibusdam, alias quae totam nulla nihil.</p>
                </div>
                <div class="r_skills resume_skills">

                </div>
                <div class="r_hobbies resume_social">

                </div>
            </div>
        </div>
        <div class="resume_right">
            <div class="r_namerole">
                <p class="resume-name">Alexander</p>
                <p class="role resume-job-title"></p>
            </div>
            <div class="r_info">
                <ul>
                    <li>
                        <p class="resume-email">alexwood@gmail.com</p>
                    </li>
                    <li>
                        <p class="resume-phone">+15 120 5677684</p>
                    </li>
                </ul>
            </div>
            <div class="r_right_sub">
                <div class="r_education resume_education">

                </div>
                <div class="r_jobs resume_work">

                </div>
                <div class="r_jobs resume_languages">

                </div>
            </div>
        </div>
    </section>


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
            // document.querySelector('.resume-address').innerText = resume.address;
            document.querySelector('.resume-phone').innerText = resume.phone;
            // document.querySelector('.resume-website').innerText = resume.websiteLink ? resume.websiteLink : 'No website';


            // Access education details
            if (resume.educations && resume.educations.length > 0) {
                let educationHtml = '';
                resume.educations.forEach(education => {
                    if (education.field && education.degree && education.school && education.location && education
                        .from) { // Ensure both name and link are present
                        educationHtml += `

                        <li>
                <div class="r_ed_left">
	              <p class="date"><span>${education.from}</span> - <span>${education.to}</span></p>
	            </div>
	            <div class="r_ed_right">
                      <p class='position-field-para'>${education.field} (${education.degree})</p>
	              <p>${education.school}</p>
                  <p class="education-location">${education.location}</p>
	              <p>${education.description}</p>
	            </div> </li>`;
                    }
                });

                // Only add the section if there are valid social links
                if (educationHtml) {
                    document.querySelector('.resume_education').innerHTML = `
                           <h2>Education</h2>
                            <ul class="resume_education">
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
    <div class="r_ed_left">
	              <p class="date"><span>${experience.from}</span> - <span>${experience.to ? experience.to : 'Currently working'}</span></p>
	            </div>
	            <div class="r_ed_right">
                    <p class="position-field-para">${experience.title}</p>
	              <p>${experience.company}</p>
                  <p>${experience.city}, ${experience.state}</p>
	              <p>${experience.description}</p>
	            </div>
                                </li>`;
                    }

                });

                // Only add the section if there are valid social links
                if (experienceHtml) {
                    document.querySelector('.resume_work').innerHTML = `

                    <h2>Work Experience</h2>
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
                    skillsHtml +=
                        `<li><p><i class="fa-solid fa-code"></i></p><p>${skill}</p></li> `;
                });

                // Insert the skills into the document
                document.querySelector('.resume_skills').innerHTML = `

	                        <h2>Skills</h2>
                            <div id="scrolls" class="groups">
                                <div id="line01" class="lines">
                                    <ul>
                                        ${skillsHtml}
                                    </ul>
                                </div>
                            </div>`;
            }

            // Access social
            if (resume.socials && resume.socials.length > 0) {
                let socialHtml = '';
                resume.socials.forEach(social => {
                    if (social.name && social.link) { // Ensure both name and link are present
                        socialHtml +=
                            `

                        <li><a href="https://${social.link}" target="_blank" style="text-decoration:none;" title="${social.name}"><p>${getSocialIcon(social.name)}</p></a></li>`;
                    }
                });


                // Access languages
                if (resume.languages && resume.languages.length > 0) {
                    // Build the HTML for the languages list
                    let languagesHtml = '';
                    resume.languages.forEach(language => {
                        languagesHtml +=
                            `
                             <li><div class="words"><p>${language}</p></div></li>`;
                    });

                    // Insert the languages into the document
                    document.querySelector('.resume_languages').innerHTML = `
                    <h2>language's</h2>
                            <ul class="languages">
                                      ${languagesHtml}
                                    </ul>`;
                }



                // Only add the section if there are valid social links
                if (socialHtml) {
                    document.querySelector('.resume_social').innerHTML = `
                      <h2>Social</h2>
                    <ul>
                                        ${socialHtml}
                                    </ul> `;
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
