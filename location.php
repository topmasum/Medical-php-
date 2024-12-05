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
         .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 10px;
        }
        
        .box {
    width:   calc(100% - 20px);
    margin-bottom: 20px;
    border: 3px solid var(--green);
    border-radius: 5px;
    box-sizing: border-box;
    display: flex;
    animation: slideInFromLeft 0.5s ease forwards;
}
@keyframes slideInFromLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
        
        .hospital-name,
        .map-location {
            width: 50%; /* Equal width for left and right parts */
            padding: 5px;
            box-sizing: border-box;
            
        }
        
        .hospital-name {
            background-color: #fff;
           

        }
        .hospital-name b{
            font-size: 24px;
            color: var(--black);
        }
        .hospital-name p {
    margin: 5px 0; /* Add some margin between paragraphs */
    font-size: 13px;
}

.hospital-name p:last-child {
    font-size: 14px; /* Adjust the font size for the phone number */
}
        
        .map-location {
            background-color: #e0e0e0;
        }
        
        iframe {
            width: 100%;
            height: 100%;
            border: 0;
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



        @media (max-width: 768px) {
            .box {
                width: 100%; /* For smaller devices, make it full width */
                flex-direction: column; /* Display items in column for smaller devices */
            }

            .hospital-name,
            .map-location {
                width: 100%; /* Make both parts full width for smaller devices */
            }
        }
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
    .content {
    padding-top: 70px; /* Adjust this value based on your header height */
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
    <div class="search-bar">
        <input type="text" class="search-input" id="searchInput" placeholder="Search by name, specialization, or hospital">
    </div>
</header>


<section class="content">
    <section class="doctors" id="doctors">
        <h1 class="heading">Hospital <span>Locations</span></h1>
        <div class="container" id="hospitalContainer">
            <!-- Hospital boxes will be dynamically generated here -->
        </div>
    </section>
</section>


<footer class="footer">
    <!-- Footer content if needed -->
</footer>

<script src="script.js"></script>
<script>
 
 
    // Data for hospitals
    // Data for hospitals
var hospitals = [
    { name: "Bangabandhu Sheikh Mujib Medical University(PG hospital)", address: "Shahbag, Dhaka-1000", phone: "+8801866-637482", mapURL: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14609.01020456916!2d90.3953664!3d23.7383718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8954649cee5%3A0x3bdcd530be93b17a!2sBangabandhu%20Sheikh%20Mujib%20Medical%20University!5e0!3m2!1sen!2sbd!4v1711343338556!5m2!1sen!2sbd" },
    { name: "Ispahani islamia eye hospital", address: "Sher e Bangla Nagar, Farmgate, Khamar Bari Rd, Dhaka 1215", phone: "+ 09610998333", mapURL: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14606.733260500194!2d90.3850365!3d23.7586699!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a63dcfe43f%3A0x59752af8fdc11b7a!2sIspahani%20Islamia%20Eye%20Institute%20and%20Hospital!5e0!3m2!1sen!2sbd!4v1711435633838!5m2!1sen!2sbd" },
    { name: "Holy Family Red Crescent Medical College Hospital", address: "1 Eskaton Garden Road", phone: "+8801716346930,+880248311721", mapURL: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.016934088994!2d90.40100414241077!3d23.746775532229282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b891de1de645%3A0x40ef87af7ed080c3!2sHoly%20Family%20Red%20Crescent%20Medical%20College%20Hospital!5e0!3m2!1sen!2sbd!4v1713541545095!5m2!1sen!2sbd" },
    { name: "Prescription Point Badda Branch", address: "North Badda, Progati Sarani Road, Rahman Mansion (Beside Hossain Market), Dhaka 1212", phone: "+8801713-333235", mapURL: "https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d11086.951510871362!2d90.42164242788601!3d23.78309733980502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3755c7968f2d6383%3A0x4792f3d186e5f9e0!2sGA-136%2C%20North%20Badda%2C%20Progati%20Sarani%20Road%2C%20Rahman%20Mansion%2C%20Dhaka%201212!3m2!1d23.7828576!2d90.4259915!5e0!3m2!1sen!2sbd!4v1713541159185!5m2!1sen!2sbd" },
    { name: "Ibn Sina Diagnostic & Consultation Center (Badda)", address: "Cha-72/1, Progoti Soroni, Uttar Badda, Dhaka-1212", phone: "+8801713-333235", mapURL: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14603.980267767032!2d90.425675!3d23.78319!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7968b69e9a1%3A0x4ae83fdb222b7e7d!2sIbn%20Sina%20Diagnostic%20%26%20Consultation%20Center%20(Badda)!5e0!3m2!1sen!2sus!4v1713542029019!5m2!1sen!2sus"  },
    { name: "250 Bedded TB Hospital, Shyamoli", address: "Shyamoli, Dhaka", phone: "+8801969-910200", mapURL: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14609.01020456916!2d90.3953664!3d23.7383718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8954649cee5%3A0x3bdcd530be93b17a!2sBangabandhu%20Sheikh%20Mujib%20Medical%20University!5e0!3m2!1sen!2sbd!4v1711343338556!5m2!1sen!2sbd" },
    { name: "Kuwait Bangladesh Friendship Govt. Hospital", address: "Isakha Ave, Dhaka 1231", phone: "+8801720-013923", mapURL: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14609.01020456916!2d90.3953664!3d23.7383718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8954649cee5%3A0x3bdcd530be93b17a!2sBangabandhu%20Sheikh%20Mujib%20Medical%20University!5e0!3m2!1sen!2sbd!4v1711343338556!5m2!1sen!2sbd" },
    { name: "National Chest Department", address: "Dhaka 1212", phone: "+ 02-55067131", mapURL: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14609.01020456916!2d90.3953664!3d23.7383718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8954649cee5%3A0x3bdcd530be93b17a!2sBangabandhu%20Sheikh%20Mujib%20Medical%20University!5e0!3m2!1sen!2sbd!4v1711343338556!5m2!1sen!2sbd" },
    { name: "Kurmitola General Hospital", address: "Tongi Diversion Rd, Dhaka", phone: "+02-55062388", mapURL: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14609.01020456916!2d90.3953664!3d23.7383718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8954649cee5%3A0x3bdcd530be93b17a!2sBangabandhu%20Sheikh%20Mujib%20Medical%20University!5e0!3m2!1sen!2sbd!4v1711343338556!5m2!1sen!2sbd" },
    { name: "Shaheed Suhrawardy Medical College and Hospital", address: " Dhaka 1207", phone: "+8801769957090", mapURL: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14609.01020456916!2d90.3953664!3d23.7383718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8954649cee5%3A0x3bdcd530be93b17a!2sBangabandhu%20Sheikh%20Mujib%20Medical%20University!5e0!3m2!1sen!2sbd!4v1711343338556!5m2!1sen!2sbd" },



    // Add more hospital data as needed

];


    // Function to generate hospital boxes
   // Function to generate hospital boxes
function generateHospitalBoxes() {
    var container = document.getElementById('hospitalContainer');
    container.innerHTML = ''; // Clear existing content

    hospitals.forEach(function(hospital) {
        var box = document.createElement('div');
        box.className = 'box';
        
        var hospitalName = document.createElement('div');
        hospitalName.className = 'hospital-name';
        hospitalName.innerHTML = '<b>' + hospital.name + '</b><br><p>' + hospital.address + '</p><p><i class="fas fa-phone"></i> ' + hospital.phone + '</p>'; // Added phone number with phone icon

        var mapLocation = document.createElement('div');
        mapLocation.className = 'map-location';
        mapLocation.innerHTML = '<iframe src="' + hospital.mapURL + '" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

        box.appendChild(hospitalName);
        box.appendChild(mapLocation);
        container.appendChild(box);
    });
}

    // Call the function to generate hospital boxes
    generateHospitalBoxes();

    // Function to filter hospitals based on search input
    function filterHospitals() {
        var input, filter, container, box, hospitalName, i, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        container = document.getElementById('hospitalContainer');
        box = container.getElementsByClassName('box');

        for (i = 0; i < box.length; i++) {
            hospitalName = box[i].getElementsByClassName('hospital-name')[0];
            txtValue = hospitalName.textContent || hospitalName.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                box[i].style.display = ""; // Display the box if the hospital name matches
            } else {
                box[i].style.display = "none"; // Hide the box if the hospital name doesn't match
            }
        }
    }

    // Event listener for input changes
    document.getElementById('searchInput').addEventListener('input', filterHospitals);


   
</script>


</body>
</html>
