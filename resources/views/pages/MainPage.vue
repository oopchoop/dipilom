<template>
<section class="container">
  <div class="doctors"><h1>Наши врачи</h1>
    <div class="menu">
      <router-link to="/therapist" class="unit">
        <img src="/public/images/Checkup.png" alt="">
        <p>Терапевт</p>
      </router-link>
      <router-link to="/gynecologist" class="unit">
        <img src="/public/images/Uterus.png" alt="">
        <p>Гинеколог</p>
      </router-link>
      <router-link to="/cardiologist" class="unit">
        <img src="/public/images/Heart.png" alt="">
        <p>Кардиолог</p>
      </router-link>
      <router-link to="/gastroenterologist" class="unit">
        <img src="/public/images/Stomach.png" alt="">
        <p>Гастроэнтеролог</p>
      </router-link>
      <router-link to="/surgeon" class="unit">
        <img src="/public/images/SurgeonSkin.png" alt="">
        <p>Хирург</p>
      </router-link>
      <router-link to="/virologist" class="unit">
        <img src="/public/images/Virus.png" alt="">
        <p>Вирусолог</p>
      </router-link>
    </div>
  </div>
  <div class="about">
    <h1>О клинике</h1>
    <div class="about-text">
      <p>Lorem ipsum dolor sit amet consectetur. Ac mauris tortor massa ut aliquam ac vel. Tortor nulla tempor mauris duis viverra sit consectetur amet.</p>
      <p>Lorem ipsum dolor sit amet consectetur. Ac mauris tortor massa ut aliquam ac vel. Tortor nulla tempor mauris duis viverra sit consectetur amet.</p>
    </div>
  </div>
  <div class="adress">
    <h1>Где мы находимся</h1>
    <p>Челябинск, ул. Васенко 25</p>
    <img src="/public/images/map.png" alt="">
  </div>
   </section>
</template>

<script lang="ts">

</script>

<style scoped>
.container{
  margin: 72px 50px 72px 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;

}
.container .doctors{
  display: flex;
  flex-direction: column;
  align-items: center;
}
.container h1{
    color: #0F2B56;
    font-size: 36px;
    margin: 0 auto;
}
.container .doctors .menu{
  display: flex;
  flex-wrap: wrap;
  gap: 55px;
  margin-top: 45px;
  justify-content: center;
}
.container .doctors .menu .unit{
  background-color: white;
  color: #0F2B56;
  display: flex;
  font-size: 24px;
  align-items: center;
  gap: 40px;
  border: none;
  box-shadow: 0 0 2px rgb(186, 201, 223);
  border-radius: 19px;
  width: 410px;
  padding-left: 35px;
  padding-top: 11px;
  padding-bottom: 11px;
  text-decoration: none;
  font-weight: 500;
}

.container .about {
  display: flex;
  flex-direction: column;
  gap: 23px;
  margin-top: 65px;
  align-items: center;
}
.container .about .about-text{
  display: flex;
  flex-direction: column;
  gap: 10px;
  text-align: center;
  justify-content: center;
  font-size: 20px;
  width: 697px;
  align-items: center;
  color: #0F2B56;
}
.container .adress{
  margin-top: 65px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 17px;
}
.container .adress p{
  font-size: 20px;
  color: #0F2B56;
  margin: 0;
  padding-bottom: 33px;
}
</style>