<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}"
        alt="ResumeSathi Logo">
    <title>My Resume</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <meta name="description" content="My resume gennerated">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap");
        @charset "UTF-8";

        body {
            padding: 0;
            margin: 0;
            background-color: #f4f4f4;
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .margin {
            width: 699px;
            margin: 0 auto;
        }

        .cv-base {
            width: 800px;
            display: flex;
            margin: 50px auto;
            border-radius: 5px;
            position: relative;
        }


        .cv-base .front {
            z-index: 2;
            width: 100%;
            min-height: 1125px;
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        .cv-base .front header {
            width: 100%;
            height: 310px;
            padding-bottom: 5px;
            margin-bottom: 5px;
            background-color: transparent;
            position: relative;
            overflow: hidden;
        }


        .cv-base .front header .head-bottom {
            z-index: 2;
            width: 100%;
            height: 254px;
            padding: 13px 0 0 0;
            background-color: transparent;
            position: absolute;
            overflow: hidden;
            top: 55px;
        }

        .cv-base .front header .head-bottom .image-left {
            position: relative;
            float: left;
            width: 220px;
            height: 220px;
            margin-right: 44px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            background-color: #292929;
            overflow: hidden;
        }

        .cv-base .front header .head-bottom .image-left img {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .cv-base .front header .head-bottom .words-right {
            float: left;
            height: 201px;
            padding: 66px 0 0 0;
            background-color: transparent;
        }

        .cv-base .front header .head-bottom .words-right h3 {
            padding: 12px 40px 9px 46px;
            margin: 0 0 0 0;
            position: relative;
            border-radius: 100px;
            display: inline-block;
            background-color: #292929;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 25px;
            color: #efefef;
        }

        .cv-base .front header .head-bottom .words-right p {
            padding: 7px 0 0 3px;
            margin: 0;
            text-transform: capitalize;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 19px;
            color: #292929;
        }

        .cv-base .front header .head-bottom .aesthetic01:before {
            content: "";
            width: 54px;
            height: 17px;
            background-color: #ff4359;
            position: absolute;
            top: 54px;
            left: 52px;
        }

        .cv-base .front header .head-bottom .aesthetic01:after {
            content: "";
            width: 54px;
            height: 17px;
            background-color: #ff4359;
            position: absolute;
            top: 70px;
            left: 29px;
        }

        .cv-base .front header .head-bottom .aesthetic02:before {
            content: "";
            width: 51px;
            height: 17px;
            background-color: #ff4359;
            position: absolute;
            top: 140px;
            left: 269px;
        }

        .cv-base .front header .head-bottom .aesthetic02:after {
            content: "";
            width: 26px;
            height: 17px;
            background-color: #ff4359;
            position: absolute;
            top: 140px;
            left: 237px;
        }

        .cv-base .front header .head-bottom .aesthetic03:before {
            content: "";
            width: 84px;
            height: 21px;
            background-color: #ff4359;
            position: absolute;
            top: 181px;
            left: 222px;
        }

        .cv-base section {
            width: 100%;
            background-color: transparent;
            overflow: hidden;
        }

        .cv-base section aside {
            float: left;
            width: 242px;
            margin-right: 20px;
            background-color: transparent;
            border-right: 1px solid #d8d8d8;
            overflow: hidden;
            margin-bottom: 50px
        }

        .cv-base section aside .aside-parts {
            width: 100%;
            padding-right: 10px;
            margin-bottom: 10px;
            background-color: transparent;
            overflow: hidden;
        }

        .cv-base section aside .aside-parts h3 {
            padding: 0 0 15px 0;
            margin: 0;
            text-align: left;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 20px;
            color: #292929;
        }

        .cv-base section aside .aside-parts ul {
            padding: 0;
            margin: 0;
            list-style-type: none;
            overflow: hidden;
        }

        .cv-base section aside .aside-parts ul li {
            width: 100%;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .cv-base section aside .aside-parts ul li h3 {
            color: #ff4359;
            font-weight: 700
        }

        .cv-base section aside .aside-parts ul li p {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #777;
        }

        .cv-base section aside #aside01 ul li p {
            line-height: 19px;
            font-size: 14px;
        }

        .cv-base section aside #aside02 {
            margin-bottom: 0;
        }

        .cv-base section aside #aside02 ul {
            padding-right: 8px;
        }

        .cv-base section aside #aside02 ul li h3 {
            padding: 0 0 3px 0;
            text-align: left;
            font-size: 15px;
        }

        .cv-base section aside #aside02 ul li p:first-of-type {
            padding: 0 0 3px 0;
            font-size: 14px;
        }

        .cv-base section aside #aside02 ul li p:last-of-type {
            line-height: 19px;
            font-size: 14px;
        }

        .education-school {
            font-weight: 600 !important;
            color: #242424 !important;
        }

        .education-location {
            margin-block: 10px !important;
        }

        .cv-base section article {
            float: right;
            width: 435px;
            background-color: transparent;
            overflow: hidden;
        }

        .cv-base section article .article-parts {
            width: 100%;
            margin-bottom: 18px;
            background-color: transparent;
            overflow: hidden;
        }

        .cv-base section article .article-parts h3 {
            padding: 0 0 20px 0;
            margin-bottom: 0;
            text-align: left;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 20px;
            color: #292929;
        }

        .cv-base section article .article-parts ul {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        .cv-base section article #article01 .groups {
            width: 100%;
            padding-right: 10px;
            overflow: hidden;
        }

        .cv-base section article #article01 .groups .lines {
            width: 100%;
            margin-bottom: 15px;
            background-color: transparent;
            overflow: hidden;
        }

        .cv-base section article #article01 .groups .lines:last-child {
            margin-bottom: 0;
        }

        .cv-base section article #article01 .groups .lines ul {
            display: flex;
            align-items: center;
            column-gap: 25px;
            row-gap: 15px;
            flex-wrap: wrap;
        }

        .cv-base section article #article01 .groups .lines ul li:last-child {
            margin-right: 0;
        }

        .cv-base section article #article01 .groups .lines ul li .icons {
            float: left;
            overflow: hidden;
        }

        .cv-base section article #article01 .groups .lines ul li .icons i {
            font-size: 14px;
            color: #ff4359;
        }

        .cv-base section article #article01 .groups .lines ul li .words {
            float: right;
            padding-top: 3px;
            overflow: hidden;
        }

        .cv-base section article #article01 .groups .lines ul li .words p {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: #777;

            a {
                text-decoration: none;
                color: #777;

                :hover {
                    color: #0038a0
                }
            }
        }

        .cv-base section article #article01 .groups #line01 {
            display: inline-block;
        }

        .cv-base section article #article01 .groups #line02 {
            display: inline-block;
        }

        .cv-base section article #article01 .groups #line03 {
            display: none;
        }

        .cv-base section article #article01 .groups #line04 {
            display: none;
        }

        .cv-base section article #article01 .groups #line05 {
            display: none;
        }

        .cv-base section article #article01 .groups #line06 {
            display: none;
        }


        .cv-base section article #article02 {
            margin-bottom: 0;
        }

        .cv-base section article #article02 ul {
            padding-right: 10px;
            overflow: hidden;
        }

        .cv-base section article #article02 ul li {
            width: 100%;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .cv-base section article #article02 ul li h3 {
            padding: 0 0 3px 0;
            text-align: left;
            font-size: 15px;
            color: #ff4359;
            margin: 0
        }

        .cv-base section article #article02 ul li p:first-of-type {
            padding: 0 0 3px 0;
            margin: 0 0 0 0;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #777;
        }

        .cv-base section article #article02 ul li p:last-of-type {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            line-height: 19px;
            font-size: 16px;
            color: #777;
        }

        .cv-base section article #article02 ul #experience01 {
            display: list-item;
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

        .position-field-para {
            color: #8a0000 !important;
            font-weight: 600 !important;
            margin-block: 5px !important;
            margin-top: 10px !important;
        }

        .experience-com-para {
            color: #4a4a4a !important;
            font-weight: 600 !important;
            margin-block: 0 5px !important;
            font-family: 'Poppins', sans-serif;
        }

        .footer-social {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: #000;
            padding: 15px;
            margin-top: 25px
        }

        .footer-social ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin: 0;
            padding: 0
        }

        .footer-social ul li .icons i {
            font-size: 14px;
            color: #ff4359;
        }

        .footer-social ul li {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .footer-social ul li .words p {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #777;

            a {
                text-decoration: none;
                color: #777;

                :hover {
                    color: #0038a0;
                }
            }
        }

        .resume_languages ul {
            column-gap: 15px!important;
        }

        .resume_languages ul li p {
            background: #ffe0e0 !important;
            padding: 0.5rem 1rem !important;
            color: #6e0000 !important;
        }

        .resume_skills ul li {
            display: flex!important;
            align-items: center!important;
            gap: 5px!important;
        }

        .cv-base .front header .head-top {
            width: 100%;
            padding: 15px;
            z-index: 1;
            background-color: #ff4359;
            overflow: hidden;


            & ul {
                list-style: none;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 20px;
                margin: 0;
                padding: 0
            }

            & ul li .icons i {
                font-size: 14px;
                color: #ffffff;
            }

            & ul li {
                display: flex;
                align-items: center;
                gap: 5px;
            }

            & ul li .words p,
            & ul li .words a {
                text-decoration: none;
                padding: 0;
                margin: 0;
                font-family: 'Poppins', sans-serif;
                font-size: 14px;
                color: #ffffff;
            }
        }
    </style>
</head>

<body>


    <div class="print-button">
        <button id="printPdfButton">Print to PDF</button>
        <button id="printImageButton">Print to Image</button>
    </div>

    <div class="cv-base resume" id="selectedResume">
        <div class="front">
            <header>
                <div class="head-top">
                    <ul>

                        <li>
                            <div class="icons"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></div>
                            <div class="words">
                                <p class="resume-address"></p>
                            </div>
                        </li>

                        <li>
                            <div class="icons"><i class="fas fa-envelope" aria-hidden="true"></i></div>
                            <div class="words">
                                <p class="resume-email"></p>
                            </div>
                        </li>

                        <li>
                            <div class="icons"><i class="fas fa-phone" aria-hidden="true"></i></div>
                            <div class="words">
                                <p class="resume-phone"></p>
                            </div>
                        </li>

                        <li>
                            <div class="icons"><i class="fab fa-firefox" aria-hidden="true"></i></div>
                            <div class="words">
                                <a href="resume-website" class="resume-website"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="head-bottom">
                    <div class="margin">
                        <div class="image-left">
                            <img loading="lazy" class="resume-photo" src="" alt="profile_pic">
                        </div>
                        <div class="words-right">
                            <h3 class="resume-name">mike maraandy</h3>
                            <p class="resume-job-title">web designer</p>
                        </div>
                    </div>
                    <div class="aesthetic01"></div>
                    <div class="aesthetic02"></div>
                    <div class="aesthetic03"></div>
                </div>
            </header>
            <section>
                <div class="margin">
                    <aside>
                        <div id="aside01" class="aside-parts">
                            <h3>about me</h3>
                            <ul id="scrolls">
                                <li>
                                    <p class="resume-about-me"></p>
                                </li>
                            </ul>
                        </div>
                        <div id="aside02" class="aside-parts resume_education">

                        </div>
                    </aside>
                    <article>
                        <div id="article01" class="article-parts resume_skills">

                        </div>
                        <div id="article02" class="article-parts resume_work">

                        </div>

                        <div id="article01" class="article-parts resume_languages">

                        </div>

                    </article>
                </div>
            </section>
            <div class="footer-social resume_social">

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
                                    <h3 class="date"><span>${education.from}</span> to <span>${education.to}</span></h3>
                                    <p class='position-field-para'>${education.field} (${education.degree})</p>
                                    <p class="education-school">${education.school}</p>
                                    <p class="education-location">${education.location}</p>
                                    <p>${education.description}</p>
                                </li>`;
                    }
                });

                // Only add the section if there are valid social links
                if (educationHtml) {
                    document.querySelector('.resume_education').innerHTML = `
                           <h3>Education</h3>
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
                                    <h3 class="date"><span>${experience.from}</span> to <span>${experience.to ? experience.to : 'Currently working'}</span></h3>
                                    <p class="position-field-para">${experience.title}</p>
                                    <p class="experience-com-para">${experience.company}</p>
                                    <p>${experience.city}, ${experience.state}</p>
                                    <p>${experience.description}</p>
                                </li>`;
                    }

                });

                // Only add the section if there are valid social links
                if (experienceHtml) {
                    document.querySelector('.resume_work').innerHTML = `

                    <h3>Experience</h3>
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
                        `
                        <li><div class="icons"><i class="fas fa-star"></i></div> <div class="words"><p>${skill}</p></div></li>`;
                });

                // Insert the skills into the document
                document.querySelector('.resume_skills').innerHTML = `

                            <h3>skills</h3>
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

                        <li><div class="icons">  ${getSocialIcon(social.name)}</div> <div class="words"><p><a href="https://${social.link}" class="social-link" target="_blank">${social.name}</a></p></div></li>`;
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
                    <h3>language's</h3>
                            <div id="scrolls" class="groups">
                                <div id="line01" class="lines">
                                    <ul>
                                      ${languagesHtml}
                                    </ul>
                                </div>
                            </div>`;
                }



                // Only add the section if there are valid social links
                if (socialHtml) {
                    document.querySelector('.resume_social').innerHTML = `
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
                // If the span doesn't have text content, set it to "Currently working"
                eachAllInp.textContent = 'Till Now';
            }
        });
    </script>
</body>

</html>
