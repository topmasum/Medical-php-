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
       .search-bar {
        position: relative;
        width: 40%;
        background-color: var(--green);
        border-radius: 10px;
        padding: 5px;
        z-index: 1000;
        position: fixed;
        top: 25px; /* Adjust this value based on your header height */
        left: 50%;
        transform: translateX(-50%);
    }

    .search-input {
        width: 100%; /* Adjusted width for responsiveness */
        padding: 5px;
        border: none;
        border-radius: 5px;
        outline: none;
        font-size: 16px;
        color: black;
    }

    .search-input::placeholder {
        color: #ccc;
    }
    
    .header {
        position: relative;
    }
   #menu-btn{
            display:initial;
            position: absolute;
        top: 50%;
        right: 20px; /* Adjust this value according to your design */
        transform: translateY(-50%);
        }
        .header .navbar{
        position: absolute;
        top:115%; right: 2rem;
        border-radius: .5rem;
        box-shadow: var(--box-shadow);
        width: 20rem;
        border: var(--border);
        background: #fff;
        transform: scale(0);
        opacity: 0;
        transform-origin: top right;
        transition: none;
    }

    .header .navbar.active{
        transform: scale(1);
        opacity: 1;
        transition: .2s ease-out;
    }

    .header .navbar a{
        font-size: 2rem;
        display: block;
        margin:2rem;
    }
@media screen and (max-width: 600px) {
    .search-bar {
        top:8px;
        width: calc(70% - 20px); /* Adjusted width for smaller devices */
        max-width: 250px; /* Limiting maximum width for smaller devices */
        left: calc(5% - 10px); /* Slightly move to the right */
        transform: translateX(0%);
    }
    .header{
        padding: 3.5rem;
        position: fixed;
    }
    .header .logo {
        display: none; /* Hide the logo */
    }

    /* Adjusting position for the menu button */
    #menu-btn {
        position: absolute;
        top: 50%;
        right: 20px; /* Adjust this value according to your design */
        transform: translateY(-50%);
    }
   
    .heading {
    padding-top: 70px; /* Adjust this value based on your header height */
}
}
.btn1{
    display: inline-block;
    margin-top: 1rem;
    padding: .5rem;
    padding-left: 1rem;
    padding-right: 1rem;
    border:var(--border);
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    color:var(--black);
    cursor: pointer;
    font-size: 1.7rem;
    background: #fff;
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
        <a href="blood2.php" class="btn1"> Login </a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
    <div class="search-bar">
        <input type="text" class="search-input" id="searchInput" placeholder="Search by name, specialization, or hospital">
    </div>

    </header>

   
<section class="doctors" id="doctors">
    <h1 class="heading"> our <span>doctors</span> </h1>
    <div class="box-container" id="box-container"></div>
</section>



<footer class="footer">
    <!-- Footer content if needed -->
</footer>

<script src="script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const boxContainer = document.getElementById("box-container");
    const searchInput = document.getElementById("searchInput");

    // Function to render doctor cards
    function renderDoctors(doctorsArray) {
        boxContainer.innerHTML = "";
        doctorsArray.forEach(doctor => {
            const box = document.createElement("div");
            box.className = "box";

            const img = document.createElement("img");
            img.src = doctor.Image;
            img.alt = doctor.Name;

            const name = document.createElement("h3");
            name.textContent = doctor.Name;

            const degree = document.createElement("span");
            degree.className = "degree-label";
            degree.innerHTML = `<strong>Degree: </strong>${doctor.Degree}`;

            const specialization = document.createElement("span");
            specialization.className = "specialization-label";
            specialization.innerHTML = `<strong>Medical: </strong>${doctor.Medical}`;

            const email = document.createElement("span");
            email.className = "email-label";
            email.innerHTML = `<strong>Email: </strong>${doctor.Email}`;

            const category = document.createElement("span");
            category.className = "category-label";
            category.innerHTML = `<strong>Category: </strong>${doctor.Category}`;

            const visitingDays = document.createElement("span");
            visitingDays.className = "visiting-days-label";
            visitingDays.innerHTML = `<strong>Visiting Days: </strong>${doctor.Visiting_Days}`;

            const visitingTime = document.createElement("span");
            visitingTime.className = "visiting-time-label";
            visitingTime.innerHTML = `<strong>Visiting Time: </strong>${doctor.Visiting_Time}`;

            const share = document.createElement("div");
            share.className = "share";
            const socialLinks = ["facebook-f", "twitter", "instagram", "linkedin"];
            socialLinks.forEach(link => {
                const a = document.createElement("a");
                a.href = "#";
                a.className = "fab fa-" + link;
                share.appendChild(a);
            });

            // Append all elements to the card
            box.appendChild(img);
            box.appendChild(name);
            box.appendChild(degree);
            box.appendChild(specialization);
            box.appendChild(email);
            box.appendChild(category);
            box.appendChild(visitingDays);
            box.appendChild(visitingTime);
            box.appendChild(share);

            // Append the card to the container
            boxContainer.appendChild(box);
        });
    }

    // Function to fetch doctors from the database
    function fetchDoctors() {
        fetch('fetch_doctors.php')
            .then(response => response.json())
            .then(data => {
                renderDoctors(data);  // Render the doctors based on the fetched data
            })
            .catch(error => {
                console.error('Error fetching doctor data:', error);
            });
    }

    // Fetch doctors when the page is loaded
    fetchDoctors();

    // Search functionality
    function filterDoctors(searchTerm) {
        fetch('fetch_doctors.php')
            .then(response => response.json())
            .then(data => {
                const filteredDoctors = data.filter(doctor =>
                    doctor.Name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    doctor.Medical.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    doctor.Category.toLowerCase().includes(searchTerm.toLowerCase())
                );
                renderDoctors(filteredDoctors);
            })
            .catch(error => {
                console.error('Error filtering doctor data:', error);
            });
    }

    searchInput.addEventListener("input", function() {
        filterDoctors(this.value.trim());
    });
});

</script>
</body>
</html>
