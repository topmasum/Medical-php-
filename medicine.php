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
      
/* Existing styles */
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

#menu-btn {
    display: initial;
    position: absolute;
    top: 50%;
    right: 20px; /* Adjust this value according to your design */
    transform: translateY(-50%);
}

.header .navbar {
    position: absolute;
    top: 115%;
    right: 2rem;
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

.header .navbar.active {
    transform: scale(1);
    opacity: 1;
    transition: .2s ease-out;
}

.header .navbar a {
    font-size: 2rem;
    display: block;
    margin: 2rem;
}
/* Existing styles */
/* ... */

/* Existing styles */
/* ... */

/* Modal styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1001; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black with opacity */
}

.modal-content {
    background-color: white;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    border-radius: 10px;
    position: relative;
    text-align: center;
}
.modal-content p{
    text-align: left;
}
.modal-content h4{
    font-size: 15px;
    color: var(--green);
    margin-top: 10px;

}
.modal-content img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.close {
    color: #aaa;
    position: absolute;
    top: 10px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.similar-medicines {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
}

.similar-medicines .box {
    cursor: pointer;
}

.similar-medicines .box img {
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.similar-medicines .box h3 {
    font-size: 14px;
    margin: 10px 0 5px 0;
}

/* Responsive styles for the modal */
@media screen and (max-width: 600px) {
    .modal-content {
        width: 90%;
        margin: 30% auto;
    }
}

/* Media query for smaller devices */
@media screen and (max-width: 600px) {
    .search-bar {
        top: 8px;
        width: calc(70% - 20px); /* Adjusted width for smaller devices */
        max-width: 250px; /* Limiting maximum width for smaller devices */
        left: calc(5% - 10px); /* Slightly move to the right */
        transform: translateX(0%);
    }
    .header {
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
        padding-top: 70px;
    }
}

/* New styles */
.box {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 15px;
    margin: 10px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.2s;
}

.box:hover {
    transform: scale(1.05);
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
    
    <section class="doctors" id="doctors">
        <h1 class="heading">Medicine <span>Info</span> </h1>
        <div class="box-container" id="box-container"></div>
    </section>
    
    <!-- Modal structure -->
    <div id="medicineModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImg" src="" alt="Medicine Image">
            <h3 id="modalName"></h3>
            <p><strong>Ingredients: </strong><span id="modalIngredients"></span></p>
            <p><strong>Indication: </strong><span id="modalIndication"></span></p>
            <p><strong>Company: </strong><span id="modalCompany"></span></p>
            <h4>Similar Medicines:</h4>
            <div id="similarMedicines" class="similar-medicines"></div>
        </div>
    </div>
    
    <footer class="footer">
        <!-- Footer content if needed -->
    </footer>
    
    <script src="script.js"></script>
    </body>
    
    
<script src="script.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const medicines = [
        { name: "Napa 500mg", Ingredients: "500 mg Paracetemol BP, 65 mg Caffeine BP", indication: "Paracetamol", company: "Square Limited", image: "image/napa-500-mg-1634182813132.jpg" },
        { name: "Napa extend", Ingredients: "500 mg Paracetemol BP, 65 mg Caffeine BP", indication: "Paracetamol", company: "Square Limited", image: "image/napa-500-mg-1634182813132.jpg" },
        { name: "Soft", Ingredients: "500 mg Paracetemol BP", indication: "Paracetamol", company: "Square Limited", image: "image/napa-500-mg-1634182813132.jpg" },
        { name: "Paracetemol", Ingredients: "500 mg Paracetemol BP, 65 mg Caffeine BP", indication: "Paracetamol", company: "Square Limited", image: "image/napa-500-mg-1634182813132.jpg" },

        { name: "Adlock 10 mg", Type: "Tablet", Ingredients: "Propranolol Hydrochloride", indication: "Tuberculosis,Hypertrophic cardiomyopathy,MI,Anxiety,Diabetic nephropathy,HTN,Cardiac arrhythmias,Angina pectoris,Phaeochromocytoma, Migraine prophylaxis,Essential tremor", company: "Sonear Laboratories Ltd", image: "image/adlock1.PNG" },
        { name: "Adrox", Type: "Suspension", Ingredients: "Cefuroxime 125 mg", indication: "Pharyngitis,Acute otitis media,Lyme disease,Susceptible infections,Sinusitis,Otitis media,Skin,Skin structure infections,Tonsillitis,Respiratory tract infections,Acute Maxillary Sinusitis,Urinary tract infections,Acute bacterial exacerbation of chronic bronchitis,Surgical Prophylaxis", company: "Ad-din Pharmaceuticals Ltd", image: "MedicineImg/adrox.jpg" },
        { name: "Clamox 375", Type: "Tablet", Ingredients: "Amoxicillin + Clavulanic Acid", indication: "Bacterial infections,Acute otitis media,Acute bacterial sinusitis,Endocarditis,Dental abscess,H. pylori infection,Community-acquired pneumonia,Acute uncomplicated UTI,Uncomplicated gonorrhea,Severe or recurrent resp tract infections", company: "Opsonin Pharma Limited", image: "image/clamox-375-mg-1631621681144.jpg" },
        { name: "Vasco", Type: "Syrup", Ingredients: "Vitamin C (Ascorbic Acid)", indication: "Treatment or prevention of Vitamin C Deficiency, Scurvy, Infection,Trauma,Burns, Cold exposure,Following Surgery,Common cold,Fever,Scurvy,Stress,Cancer, Methaemoglobinaemia, Children receiving unfortified formulas. Also indicated in Hematuria,Dental Caries,Gum Diseases,Pyorrhea,Acne,Infertility, Atherosclerosis,Fractures,Leg ulcers,Hay fever,Vascular thrombosis prevention,Levodopa toxicity,Arsenic toxicity,Etc.", company: "Opsonin Pharma Limited", image: "image/vasco.jpg" },
        { name: "Aspidol", Type: "Tablet", Ingredients: "Aspirin 100mg", indication: "Pain relief, Fever reduction, Anti-inflammatory, Blood thinner", company: "Medico Ltd", image: "image/aspidol1.PNG" },
        { name: "Azithrocin", Type: "Tablet", Ingredients: "Azithromycin 500mg", indication: "Bacterial infections, Respiratory infections, Skin infections, Ear infections, STIs", company: "Pharma Corp", image: "MedicineImg/azithrocin.jpg" },
        { name: "Cetrimide", Type: "Cream", Ingredients: "Cetrimide 0.5%", indication: "Antiseptic, Skin infections, Minor cuts, Burns, Wounds", company: "SkinHeal Ltd", image: "MedicineImg/cetrimide.jpg" },
        { name: "Dolo 650", Type: "Tablet", Ingredients: "Paracetamol 650mg", indication: "Pain relief, Fever reduction", company: "HealthCare Pharma", image: "MedicineImg/dolo650.jpg" },
        { name: "Erythrocin", Type: "Tablet", Ingredients: "Erythromycin 250mg", indication: "Bacterial infections, Respiratory infections, Skin infections, STIs", company: "MedLife Ltd", image: "MedicineImg/erythrocin.jpg" },
        // New medicines
        { name: "Ceftri", Type: "Injection", Ingredients: "Ceftriaxone 1g", indication: "Bacterial infections, Respiratory infections, Skin infections, Urinary tract infections, Meningitis", company: "BioPharma Ltd", image: "MedicineImg/ceftri.jpg" },
        { name: "Paranorm", Type: "Tablet", Ingredients: "Paracetamol 500mg", indication: "Pain relief, Fever reduction", company: "Medico Ltd", image: "MedicineImg/paranorm.jpg" },
        { name: "Claribid", Type: "Tablet", Ingredients: "Clarithromycin 500mg", indication: "Bacterial infections, Respiratory infections, Skin infections, H. pylori infection", company: "BioPharma Ltd", image: "MedicineImg/claribid.jpg" },
        { name: "Vitafiz", Type: "Effervescent Tablet", Ingredients: "Vitamin C 1000mg", indication: "Vitamin C deficiency, Immune support, Antioxidant", company: "HealthCare Pharma", image: "MedicineImg/vitafiz.jpg" },
        { name: "Calmep", Type: "Tablet", Ingredients: "Propranolol Hydrochloride", indication: "Hypertension, Anxiety, Migraine prophylaxis, Angina pectoris, Cardiac arrhythmias", company: "Zenith Pharma", image: "MedicineImg/calmep.jpg" }
    ];

    const boxContainer = document.getElementById("box-container");
    const searchInput = document.getElementById("searchInput");
    const modal = document.getElementById("medicineModal");
    const modalImg = document.getElementById("modalImg");
    const modalName = document.getElementById("modalName");
    const modalIngredients = document.getElementById("modalIngredients");
    const modalIndication = document.getElementById("modalIndication");
    const modalCompany = document.getElementById("modalCompany");
    const similarMedicinesContainer = document.getElementById("similarMedicines");
    const closeModal = document.querySelector(".close");

    function renderMedicines(medicinesArray) {
        boxContainer.innerHTML = "";
        medicinesArray.forEach(medicine => {
            const box = document.createElement("div");
            box.className = "box";

            const img = document.createElement("img");
            img.src = medicine.image;
            img.alt = medicine.name;

            const name = document.createElement("h3");
            name.textContent = medicine.name;

            const ingre = document.createElement("span");
            const ingreLabel = document.createElement("strong");
            ingreLabel.textContent = "Ingredients: ";
            ingre.appendChild(ingreLabel);
            ingre.appendChild(document.createTextNode(medicine.Ingredients));
            ingre.className = "ingre-label";
            ingre.appendChild(document.createElement("br"));

            const indication = document.createElement("span");
            const indicationLabel = document.createElement("strong");
            indicationLabel.textContent = "Indication: ";
            indication.appendChild(indicationLabel);
            indication.appendChild(document.createTextNode(medicine.indication));
            indication.className = "indication-label";
            indication.appendChild(document.createElement("br"));

            const company = document.createElement("span");
            const companyLabel = document.createElement("strong");
            companyLabel.textContent = "Company: ";
            company.appendChild(companyLabel);
            company.appendChild(document.createTextNode(medicine.company));
            company.className = "company-label";
            company.appendChild(document.createElement("br"));

            box.appendChild(img);
            box.appendChild(name);
            box.appendChild(ingre);
            box.appendChild(indication);
            box.appendChild(company);

            // Add click event to open modal with medicine details
            box.addEventListener("click", () => {
                modalImg.src = medicine.image;
                modalName.textContent = medicine.name;
                modalIngredients.textContent = medicine.Ingredients;
                modalIndication.textContent = medicine.indication;
                modalCompany.textContent = medicine.company;
                showSimilarMedicines(medicine);
                modal.style.display = "block";
            });

            boxContainer.appendChild(box);
        });
    }

    function showSimilarMedicines(selectedMedicine) {
        similarMedicinesContainer.innerHTML = "";
        const similarMedicines = medicines.filter(medicine => 
            medicine !== selectedMedicine && medicine.Ingredients === selectedMedicine.Ingredients
        );
        similarMedicines.forEach(medicine => {
            const box = document.createElement("div");
            box.className = "box";

            const img = document.createElement("img");
            img.src = medicine.image;
            img.alt = medicine.name;

            const name = document.createElement("h3");
            name.textContent = medicine.name;

            box.appendChild(img);
            box.appendChild(name);

            box.addEventListener("click", () => {
                modalImg.src = medicine.image;
                modalName.textContent = medicine.name;
                modalIngredients.textContent = medicine.Ingredients;
                modalIndication.textContent = medicine.indication;
                modalCompany.textContent = medicine.company;
                showSimilarMedicines(medicine);
            });

            similarMedicinesContainer.appendChild(box);
        });
    }

    function filterMedicines(searchTerm) {
        const filteredMedicines = medicines.filter(medicine =>
            medicine.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
            medicine.Ingredients.toLowerCase().includes(searchTerm.toLowerCase()) ||
            medicine.indication.toLowerCase().includes(searchTerm.toLowerCase()) ||
            medicine.company.toLowerCase().includes(searchTerm.toLowerCase())
        );
        renderMedicines(filteredMedicines);
    }

    searchInput.addEventListener("input", function() {
        filterMedicines(this.value.trim());
    });

    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    renderMedicines(medicines);
});

</script>
</body>
</html>