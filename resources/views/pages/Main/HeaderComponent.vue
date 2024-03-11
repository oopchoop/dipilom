<template>
<header>
  <div class="top-header">
    <router-link to="/"><img src="/public/images/logo.png"></router-link>
    <div class="right-header">
      <div class="click">
        <router-link to="/doctors" v-if="!inforamtionUser['isAdmin']"><button class="appointment">Записаться к врачу</button></router-link>
        <router-link to="/adminsch" v-else><button class="appointment">Администратор</button></router-link>
        <router-link to="/autorization" v-if="!inforamtionUser">
          <img src="/public/images/Account.png" alt="Вход">
        </router-link>
        <router-link to="/profile" v-else>
          <img src="/public/images/Account.png" alt="Вход">
        </router-link>
      </div>
      <div class="contacts">
        <p>+7(351) 255-25-25</p>
        <p>Челябинск, ул. Васенко 25</p>
      </div>
    </div>
  </div>
  <div class="bottom-header">
    <router-link to="/servicesandprice">Услуги и цены</router-link>
    <router-link to="/doctors">Специалисты</router-link>
    <router-link to="/doctors">Запись к врачу</router-link>
    <router-link to="/contacts">Контакты</router-link>
  </div>
</header>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";

export default defineComponent(
    {
        data: () => {
          return {
            inforamtionUser: {}
          }
        },
        mounted() {
          axios.get('/user').then(response => {this.inforamtionUser = response.data})
        }
    }
)
</script>

<style scoped>

header{
  display: flex;
  flex-direction: column;
  gap: 28px;
  justify-content: center;
  background-color: #719FE7;
}
header .top-header{
  margin: 15px auto 15px auto;
  width: 1440px;
  display: flex;
  gap: 540px;
  align-items: center;
}
header .top-header .right-header{
  display: flex;
  align-items: center;
  gap: 95px;
}

header .top-header .right-header .click{
  display: flex;
  align-items: center;
  gap: 40px;
}
header .top-header .right-header .click .appointment{
  color: #0F2B56;
  font-size: 20px;
  background-color: white;
  padding: 16px 22px;
  border-radius: 36px;
  border: none;
}
header .top-header .right-header .contacts{
  color: white;
  font-size: 20px;
  display: flex;
  flex-direction: column;
  gap: 7px;
}
header .top-header .right-header .contacts p{
  margin: 0;
}
header .bottom-header{
  background-color: #F5F5F5;
  width: 100%;
  display: flex;
  justify-content: center;
  gap: 60px;
  padding-top: 25px;
}
header .bottom-header a{
  text-decoration: none;
  color: #0F2B56;
  font-size: 20px;

}
</style>