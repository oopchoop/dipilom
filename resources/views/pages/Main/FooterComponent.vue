<template>
<footer>
  <router-link to="//"><img src="/public/images/logo.png"></router-link>
  <div class="menu">
    <div class="links">
      <router-link to="/servicesandprice">Услуги и цены</router-link>
      <router-link to="/doctors">Специалисты</router-link>
      <router-link to="/doctors">Запись к врачу</router-link>
      <router-link to="/contacts">Контакты</router-link>
    </div>
    <div class="contacts">
      <p>+7(351) 255-25-25</p>
      <p>Челябинск, ул. Васенко 25</p>
    </div>
    <router-link to="/doctors"><button class="appointment">Записаться к врачу</button></router-link>
  </div>
</footer>
</template>

<script lang="ts">

</script>

<style scoped>
footer{
  background-color: #719FE7;
  margin-top: 65px;
  display: flex;
  gap: 110px;
  padding-top: 55px;
  padding-left: 230px;
  padding-bottom: 80px;
}
footer  img{
  width: 225px;
  height: 101px;
}
footer .menu{
  display: flex;
  gap: 100px;
  color: white;
}
footer .menu .links{
  display: flex;
  flex-direction: column;
  gap: 17px;
}
footer .menu .links a{
  text-decoration: none;
  color: white;
  font-size: 18px;
}
footer .menu .contacts{
  display: flex;
  flex-direction: column;
  width: 151px;
  font-size: 18px;
  gap: 10px;
}
footer .menu .contacts p{
  margin: 0;
}
footer .menu button{
  color: #0F2B56;
  font-size: 20px;
  background-color: white;
  width: 241px;
  height: 59px;
  border-radius: 36px;
  border: none;
}
</style>