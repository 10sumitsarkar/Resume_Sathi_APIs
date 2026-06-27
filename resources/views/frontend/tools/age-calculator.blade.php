<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Google Ads Start --}}
    @include('frontend.layout.inc.ads.auto-ads')
    {{-- Google Ads End --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}"
        alt="W3CoderSchool Logo">
    <title>Age Calculator | w3coderschool</title>
    <meta name="description"
        content="This free age calculator computes age in terms of years, months, days, hours, minutes, and seconds, given a date of birth.">
    <meta name="keywords"
        content="age calculator, calculate age online, online age calculator, age finder tool, birthday age calculator, how old am I calculator, age calculator by date of birth, find your age, calculate age by birthdate, free age calculator, quick age calculator, age calculator tool, age difference calculator, exact age calculator, current age calculator">
    <link rel="canonical" href="https://www.w3coderschool.com/age-calculator" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="Age Calculator | w3coderschool" />
    <meta property="og:description"
        content="This free age calculator computes age in terms of years, months, days, hours, minutes, and seconds, given a date of birth." />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.w3coderschool.com/age-calculator" />
    <!--- OG meta tags end -->

    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/tools-style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/tool-responsive.css') }}">

    {{-- Google analytics code start --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L3QP8NJR3K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-L3QP8NJR3K');
    </script>
    {{-- Google analytics code end --}}
</head>

<body>
    @php
        use Illuminate\Support\Carbon;
    @endphp

    @include('frontend.layout.inc.header')

    <section class="pb-4  pt-3 pt-md-5">
        <div class="container-fluid common-container">
            <h1 class="topics-heading text-start pb-3">Age <span> Calculator</span></h1>
            <p class="topics-heading-para">The Age Calculator can determine the age or interval between two dates. The
                calculated age will be displayed in years, months, days, hours, minutes, and seconds.</p>
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <section class="document-upload-section">
                        <form action="javascript:void(0)">
                            <div class="age-calculator-input-div">
                                <label for="dobInput">Date of Birth</label>
                                <input type="date" id="dobInput" class="pointer-cursor" required>

                                <label for="AgeOnDate" class="mt-3">Age on this date:</label>
                                <input type="date" id="AgeOnDate" onchange="ageOnFun()" class="pointer-cursor"
                                    required>
                                <div class="mt-4 ageCalculateResetBtnDiv"><button type="button"
                                        class="btn age-tools-button" id="calculate-btn">Calculate</button><button
                                        type="reset" id="reset-btn" class="resetBtn">Reset</button></div>
                            </div>
                        </form>
                    </section>

                    <p id="ageToolError1" class='invalid-error mx-auto mt-2'>Enter Your DOB Please</p>
                    <div id="disBlock">
                        <p id="disBD"></p>
                        <p id="display" class="YearMonthDayDisplay"></p>
                        <p id="time" class="hourMinSecDisplay"></p>
                    </div>
                    <div class="pincode-tool-details-div">

                        <p>By entering your date of birth and a specific date (such as today or any other date you choose), it allows you to find your age in years, months, and days.</p>

                        <h2>Why is this age calculator useful?</h2>
                        <ul>
                            <li><b>Easy to Use:</b> Anyone can easily use it because of its simple design.</li>
                            <li><b>Accurate Results:</b> It provides you with an accurate number of days, months, and years with hours, minutes, and seconds.</li>
                            <li><b>Flexible Date Option:</b> You can select any date like today, yesterday, or tomorrow
                                to find out your age.</li>
                            <li><b>Everyone is free:</b> You can use it without downloading anything or paying for it.</li>
                        </ul>
                        <h2>Why would you use it?</h2>
                        <ul>
                            <li>To know your exact age.</li>
                            <li>For filling out forms or documents where your age is required.</li>
                            <li>To plan birthdays or anniversaries by checking exact dates.</li>
                        </ul>

                        <h2>How to use it?</h2>
                        <ul>
                            <li>Select date of birth</li>
                            <li>Choose the date on which you want to know the age.</li>
                            <li>Click on the calculate button.</li>
                            <li>The age is now displayed.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <!-- Google search Start -->
                    <div class="right_search_input">
                        @include('frontend.layout.inc.sidebar-components.search-adsense')
                    </div>
                    <!-- Google search End -->

                    {{-- Others Tools  Start --}}
                    @include('frontend.layout.inc.sidebar-components.tools-categories')
                    {{-- Other Tools End --}}
                </div>

            </div>

        </div>
    </section>
    @include('frontend.layout.inc.footer')

    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom.min.js') }}"></script>

    <script>
        //dd/mm/yyyy
        var date = new Date();
        var month = date.getMonth() + 1;
        if (month < 10) {
            var month = '0' + month;
        } else {
            var month = date.getMonth() + 1;
        }
        var day = date.getDate();
        if (day < 10) {
            var day = '0' + date.getDate()
        } else {
            var day = date.getDate();
        }
        var year = date.getFullYear();

        let selectInputValue = document.getElementById("AgeOnDate");
        var changeDateFormate = year + '-' + month + '-' + day;
        selectInputValue.value = changeDateFormate;

        let display = document.getElementById("display");
        let input = document.getElementById("dobInput");
        let calculateButton = document.getElementById('calculate-btn');
        let resetButton = document.getElementById('reset-btn');
        let time = document.getElementById("time");
        let disBlock = document.getElementById("disBlock");
        let disBD = document.getElementById("disBD");
        let about = document.getElementById("about");
        let selectInputValue2 = document.getElementById("AgeOnDate");

        function ageOnFun() {
            var selectedDateVal = selectInputValue2.value;

            disBlock.style.display = "none";

            let dob = new Date(),
                today = new Date(selectedDateVal),
                calTime;

            function samay() {
                let d = new Date();
                time.innerHTML = '<span>' + d.getHours() + '</span>' + " Hours, " +
                    '<span>' + d.getMinutes() + '</span>' + " Minutes, " + '<span>' + d.getSeconds() + '</span>' +
                    " Seconds";
            }

            function calculate() {
                disBlock.style.display = "block";
                let x = input.value.split("-");
                dob.setDate(x[2]);
                dob.setMonth(x[1] - 1);
                dob.setFullYear(x[0]);
                let year, month, day, HBD;
                day = (function() {
                    if (today.getDate() > dob.getDate()) {
                        return today.getDate() - dob.getDate() - 1;
                    } else if (today.getDate() == dob.getDate()) {
                        return today.getDate() - dob.getDate();
                    } else {
                        let calDate = new Date(dob.getFullYear(), dob.getMonth() + 1, 0);
                        return (today.getDate() + calDate.getDate()) - dob.getDate() - 1;
                    }
                }());
                month = (function() {
                    if (today.getMonth() >= dob.getMonth()) {
                        if (today.getDate() >= dob.getDate()) {
                            return today.getMonth() - dob.getMonth();
                        } else {
                            if ((today.getMonth() - 1) >= dob.getMonth()) {
                                return (today.getMonth() - 1) - dob.getMonth();
                            } else {
                                return ((today.getMonth() - 1) + 12) - dob.getMonth();
                            }
                        }
                    } else {
                        if (today.getDate() >= dob.getDate()) {
                            return (today.getMonth() + 12) - dob.getMonth();
                        } else {
                            return ((today.getMonth() - 1) + 12) - dob.getMonth();
                        }
                    }
                }());
                year = (function() {
                    if (dob.getMonth() == today.getMonth()) {
                        if (dob.getDate() > today.getDate()) {
                            return (today.getFullYear() - 1) - dob.getFullYear();
                        } else {
                            return today.getFullYear() - dob.getFullYear();
                        }
                    } else {
                        if (dob.getMonth() > today.getMonth()) {
                            return (today.getFullYear() - 1) - dob.getFullYear();
                        } else {
                            return today.getFullYear() - dob.getFullYear();
                        }
                    }
                }());
                HBD = (function() {
                    if (today.getMonth() == dob.getMonth()) {
                        if (today.getDate() == dob.getDate()) {
                            disBD.style.display = 'inline-block';
                            disBD.innerHTML =
                                "<p class='ageOmgText'>OMG it's your Birthday</p><p class='wishingText'>Happy Birthday To You</p>";
                        } else {
                            disBD.style.display = 'none';
                            disBD.innerHTML = "";
                        }
                    } else {
                        disBD.style.display = 'none';
                        disBD.innerHTML = "";
                    }
                }());
                if (year == today.getFullYear()) {
                    document.getElementById('ageToolError1').style.display = 'block'
                } else {
                    document.getElementById('ageToolError1').style.display = 'none'
                    display.innerHTML = "<b class='youAgeText'>Your Age is</b>" + '<span>' + year + '</span>' + " Years, " +
                        '<span>' + month + '</span>' + " Months, " + '<span>' + day + '</span>' + " Days, ";
                    calTime = setInterval(samay, 1000);
                }
            }
            calculateButton.onclick = calculate; //when calculate button is clicked
            function reset() {
                display.innerHTML = "";
                time.innerHTML = null;
                clearInterval(calTime);
                disBlock.style.display = "none";
            }
            resetButton.onclick = reset; //when the reset button is clicked

        }
        // Hide DOB error message when select date
        let inputAgain = document.getElementById("dobInput");
        inputAgain.addEventListener('change', function(e) {
            document.getElementById('ageToolError1').style.display = 'none'
        })
        // --------
        disBlock.style.display = "none";

        let dob = new Date(),
            today = new Date(),
            calTime;

        function samay() {
            let d = new Date();

            time.innerHTML = '<span>' + d.getHours() + '</span>' + " Hours, " +
                '<span>' + d.getMinutes() + '</span>' + " Minutes, " + '<span>' + d.getSeconds() + '</span>' + " Seconds";

        }

        function calculate() {
            disBlock.style.display = "block";
            let x = input.value.split("-");
            dob.setDate(x[2]);
            dob.setMonth(x[1] - 1);
            dob.setFullYear(x[0]);
            let year, month, day, HBD;
            day = (function() {
                if (today.getDate() > dob.getDate()) {
                    return today.getDate() - dob.getDate() - 1;
                } else if (today.getDate() == dob.getDate()) {
                    return today.getDate() - dob.getDate();
                } else {
                    let calDate = new Date(dob.getFullYear(), dob.getMonth() + 1, 0);
                    return (today.getDate() + calDate.getDate()) - dob.getDate() - 1;
                }
            }());
            month = (function() {
                if (today.getMonth() >= dob.getMonth()) {
                    if (today.getDate() >= dob.getDate()) {
                        return today.getMonth() - dob.getMonth();
                    } else {
                        if ((today.getMonth() - 1) >= dob.getMonth()) {
                            return (today.getMonth() - 1) - dob.getMonth();
                        } else {
                            return ((today.getMonth() - 1) + 12) - dob.getMonth();
                        }
                    }
                } else {
                    if (today.getDate() >= dob.getDate()) {
                        return (today.getMonth() + 12) - dob.getMonth();
                    } else {
                        return ((today.getMonth() - 1) + 12) - dob.getMonth();
                    }
                }
            }());
            year = (function() {
                if (dob.getMonth() == today.getMonth()) {
                    if (dob.getDate() > today.getDate()) {
                        return (today.getFullYear() - 1) - dob.getFullYear();
                    } else {
                        return today.getFullYear() - dob.getFullYear();
                    }
                } else {
                    if (dob.getMonth() > today.getMonth()) {
                        return (today.getFullYear() - 1) - dob.getFullYear();
                    } else {
                        return today.getFullYear() - dob.getFullYear();
                    }
                }
            }());
            HBD = (function() {
                if (today.getMonth() == dob.getMonth()) {
                    if (today.getDate() == dob.getDate()) {
                        disBD.style.display = 'inline-block';
                        disBD.innerHTML =
                            "<p class='ageOmgText'>OMG it's your Birthday</p><p class='wishingText'>Happy Birthday To You</p>";
                    } else {
                        disBD.style.display = 'none';
                        disBD.innerHTML = "";
                    }
                } else {
                    disBD.style.display = 'none';
                    disBD.innerHTML = "";
                }
            }());
            if (year == today.getFullYear()) {
                document.getElementById('ageToolError1').style.display = 'block'
            } else {
                document.getElementById('ageToolError1').style.display = 'none'
                display.innerHTML = "<b class='youAgeText'>Your Age is</b>" + '<span>' + year + '</span>' + " Years, " +
                    '<span>' + month + '</span>' + " Months, " + '<span>' + day + '</span>' + " Days, ";
                calTime = setInterval(samay, 1000);
            }
        }
        calculateButton.onclick = calculate; //when calculate button is clicked
        function reset() {
            display.innerHTML = "";
            time.innerHTML = null;
            clearInterval(calTime);
            disBlock.style.display = "none";
        }
        resetButton.onclick = reset; //when the reset button is clicked
    </script>
</body>

</html>
