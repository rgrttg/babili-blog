<template>
    <div class="card">
        <div class="Photo">
            <img src="Platzhalter-Bild (1).png" alt="" />
        </div>
        <div class="details">
            <p class="titel">
                CDEs: Offering Improved Dev Productivity & Experience
            </p>
            <p class="description">
                In the second accompanying blog to our recent CDE Adoption
                Report, we delve further into how CDEs impact developer
                productivity and job satisfaction.
            </p>
            <div class="user-details">
                <div class="user-photo">
                    <img src="Platzhalter-Bild (1).png" alt="" />
                </div>
                <p class="user-name description">Andrew Tate</p>
                <p class="published-on description">05.April.2024</p>
            </div>
            <a class="read-more" href="">Read More</a>
            <div class="buttons">
                <a class="button" href=""> Bearbeiten</a>
                <a class="button" href=""> Löschen</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardComponent",
};
</script>

<style scoped>
.card {
    border-radius: 10px;
    display: flex;
    align-items: center;
    background-color: #06000f;
    max-width: 1000px;
    min-height: 300px;
}

.Photo {
    width: 100%;
    height: 100%;
}

.details {
    height: 250px;
    display: flex;
    flex-direction: column;
    color: white;
    justify-content: space-between;
}

.user-photo {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}

.user-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-details {
    width: 250px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.read-more {
    text-decoration: none;
}

.titel {
    font-size: 24px;
    font-weight: 400;
}

.description {
    font-size: 16px;
    font-weight: 200;
    color: #b0b0b0;
}

p {
    margin: 0%;
}

.button {
    width: 100%;
    height: 30px;
    background: radial-gradient(
        circle at right top,
        purple,
        rgba(128, 128, 128, 0.639),
        green
    );
    border-radius: 50px;
    padding: 6px;
    color: white;
    font-weight: bold;
    font-size: 16px;
    text-align: center;
    line-height: 30px;
    text-decoration: none;
}
</style>
