
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Information - MEDI CARE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add your existing styles here... */
         * {
            box-sizing: border-box
        }
        body {
            font-family: Verdana, sans-serif; margin:0
        }
        .mySlides {
            display: none
        }
        img {
            vertical-align: middle;
        }
        /* Slideshow container */
        .slideshow-container {
            max-width: 90%;
            position: relative;
            margin: auto;
        }
        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }
        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }
        /* Caption text */
       .button1{
        margin-bottom: 10px;
       }
        .reg-button {
    background: var(--green);
    color: white;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px 15px;
    width: 40%; /* Adjusted width for smaller devices */
    margin: auto;
    border-radius: 5px; /* Added border radius */
}

@media only screen and (max-width: 500px) {
    .reg-button {
        font-size: 14px; /* Adjusted font size */
        width: 60%; /* Further adjustment for smaller screens */
    }
}

@media only screen and (max-width: 350px) {
    .reg-button {
        font-size: 12px; /* Further reduced font size */
        width: 80%; /* Adjusted width for even smaller screens */
    }
}

        /* Number text (1/3 etc) */
        .contact-header {
            padding-top: 100px;
            text-align: center;
            margin-top: 20px;
        }

        .responsive-header {
            font-size: 24px;
            font-weight: bold;
        }
      .box-container .box h1{
        color: var(--green);
      }
        .active, .dot:hover {
            background-color: #717171;
        }
        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }
        @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }
        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }
        .slide{
            margin-top: 100px;
        }
        .register-form-container {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .register-form-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            animation: animatezoom 0.6s;
            border-radius: 10px;
            position: relative;
        }
        .register-form-content input[type=text], 
        .register-form-content input[type=password],
        .register-form-content input[type=email],
        .register-form-content textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }
        .register-form-content button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
        .register-form-content button:hover {
            opacity: 0.8;
        }
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }
        @keyframes animatezoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }

        .card {
            width: 300px;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .card-img {
            width: 100%;
           height: auto;
            overflow: hidden;
            border-radius: 8px 8px 0 0;
        }

        .card-img img {
            width: 100%;
            height: auto; /* Changed width */
            display: block;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card-content p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            margin-top: 1rem;
            padding: .3rem;
            padding-left: .5rem;
            border: var(--border);
            border-radius: .3rem;
            box-shadow: var(--box-shadow);
            color: var(--green);
            cursor: pointer;
            font-size: 1.4rem;
            background: #fff;
        }

        .btn span {
            padding: .4rem .5rem;
            border-radius: .3rem;
            background: var(--green);
            color: #fff;
            margin-left: .3rem;
        }

        .btn:hover {
            background: var(--green);
            color: #fff;
        }

        .btn:hover span {
            color: var(--green);
            background: #fff;
            margin-left: .5rem;
        }
        .link {
    text-decoration: underline;
  }

        @media only screen and (max-width: 500px) {
            .prev, .next,.text {font-size: 14px}
            .dot{
                height: 8px;
                width: 8px;
            }
            .register-form-container{
                margin-top: 20px;
            }
           
        }
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 350px) {
            .prev, .next,.text {font-size: 11px}
            .dot{
                height: 8px;
                width: 8px;
            }
        
            .slideshow-container {
                max-width: 100%;
                
                position: relative;
                margin: auto;
            }
            .slide{
                margin-top: 95px;
            }
            .register-form-container{
                margin-top: 15px;
            }
           
        }
       
    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i>MEDI CARE</a>
        <nav class="navbar">
            <a href="index.php#home">Home</a>
            <a href="#services">Services</a>
            <a href="medicine.php">Medicine</a>
            <a href="doctor.php">Doctors</a>
            <a href="location.php">Locations</a>
            <a href="#about">About</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <div class="contact-header">
        <h1 class="heading"> Blood <span>Info</span> </h1>
    </div>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <a><h1>Blood Bank & Transfusion Center</h1> <i class="fas fa-phone"></i> +8801751-505030</a>
                <a><h1>Bangladesh Blood Bank and Transfusion Center</h1> <i class="fas fa-phone"></i> +8801850-077185</a>
                <a><h1>Bangladesh Red Crescent Society</h1> <i class="fas fa-phone"></i> +8801716346930</a>
                <a><h1>Badhon</h1>
                    <span><i class="fas fa-phone"></i> +8801534982674</span><br>
                    <span><a class="link" href="https://www.badhan.org/">www.badhon.org</a></span>
                </a>
            </div>
        </div>
    </section>

    <div class="button1">
        <button class="reg-button" onclick="openForm()">Registration for blood donation</button>
    </div>

    <div class="register-form-container" id="registerForm">
        <form class="register-form-content" id="registrationForm" onsubmit="submitForm(event)">
            <span class="close" onclick="closeForm()">&times;</span>
            <h2>Registration Form</h2>
            <div>
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>
            </div>

            <div>
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>
            </div>

            <div>
                <label for="phone"><b>Phone Number</b></label>
                <input type="text" placeholder="Enter Phone Number" name="phone" required>
            </div>

            <div>
                <label for="nid"><b>NID Number</b></label>
                <input type="text" placeholder="Enter NID Number" name="nid" required>
            </div>

            <div>
                <label for="blood_type"><b>Blood Type</b></label>
                <select name="blood_type" required>
                    <option value="">Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>

            <div>
                <label for="image"><b>Image Attachment</b></label>
                <input type="file" accept="image/*" name="image" required>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <section class="review" id="review">
        <h1 class="heading">Our <span>Blood Donator</span></h1>
        <div class="box-container" id="cardContainer">
            <!-- Existing cards here -->
            <div class="box">
                <img src="image/pexels-justin-shaifer-1222271.jpg" alt="">
                <h3>Rimon Khan</h3>
                <p class="text">
                    <strong>Phone:</strong> +1234567890<br>
                    <strong>Email:</strong> johndoe@example.com<br>
                    <strong>Blood Type:</strong> A+
                </p>
            </div>
            <div class="box">
                <img src="image/pexels-daniel-xavier-1239291.jpg" alt="">
                <h3>Tasnim Oishy</h3>
                <p class="text">
                    <strong>Phone:</strong> +1987654321<br>
                    <strong>Email:</strong> janesmith@example.com<br>
                    <strong>Blood Type:</strong> B-
                </p>
            </div>
            <div class="box">
                <img src="image/pexels-hannah-nelson-1065084.jpg" alt="">
                <h3>Disha Khan</h3>
                <p class="text">
                    <strong>Phone:</strong> +1122334455<br>
                    <strong>Email:</strong> alexjohnson@example.com<br>
                    <strong>Blood Type:</strong> AB+
                </p>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    <script>
       function openForm() {
    document.getElementById("registerForm").style.display = "block";
}

function closeForm() {
    document.getElementById("registerForm").style.display = "none";
}

// Function to save cards to local storage
function saveCardsToLocalStorage(cards) {
    localStorage.setItem('cards', JSON.stringify(cards));
}

// Function to load cards from local storage
function loadCardsFromLocalStorage() {
    const savedCards = localStorage.getItem('cards');
    return savedCards ? JSON.parse(savedCards) : [];
}

// Function to render cards
function renderCards(cards) {
    const cardContainer = document.getElementById('cardContainer');
    cardContainer.innerHTML = ''; // Clear the container before adding new cards
    cards.forEach((card) => {
        const newCard = document.createElement('div');
        newCard.className = 'box';
        newCard.innerHTML = `
            <img src="${card.image}" alt="">
            <h3>${card.name}</h3>
            <p class="text">
                <strong>Phone:</strong> ${card.phone}<br>
                <strong>Email:</strong> ${card.email}<br>
                <strong>Blood Type:</strong> ${card.bloodType}
            </p>
        `;
        cardContainer.appendChild(newCard);
    });
}

// Initial load
let cards = loadCardsFromLocalStorage();
renderCards(cards);

// Submit form and create a new card
function submitForm(event) {
    event.preventDefault(); // Prevent form from submitting the traditional way

    // Get form data
    const form = document.getElementById('registrationForm');
    const formData = new FormData(form);

    const name = formData.get('name');
    const email = formData.get('email');
    const phone = formData.get('phone');
    const bloodType = formData.get('blood_type');
    const imageFile = formData.get('image');

    const reader = new FileReader();
    reader.onload = function(event) {
        const imgSrc = event.target.result;

        // Create a new card object
        const newCard = {
            name: name,
            email: email,
            phone: phone,
            bloodType: bloodType,
            image: imgSrc
        };

        // Add the new card to the array of cards and save to local storage
        cards.push(newCard);
        saveCardsToLocalStorage(cards);

        // Render the new card
        renderCards(cards);

        closeForm(); // Close the form after submission
        alert("Registration Successful!");
    };

    reader.readAsDataURL(imageFile); // Read the image as a data URL
}

    </script>
</body>
</html>

