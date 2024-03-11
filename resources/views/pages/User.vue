<template>
  <section class="user">
    <div class="top-list">
      <h1>Личный кабинет</h1>
      <a href="/logout" class="logout">Выход</a>
    </div>
    <div class="menu-user">
      <router-link to="/profile"class="personal">Личные данные</router-link>
      <router-link to="/userrecords"class="records">Записи на прием </router-link>
    </div>
    <div class="personal-data">
      <div class="titles">
        <p class="title">ФИО</p>
        <p class="title">Дата рожденияч</p>
        <p class="title">Телефон</p>
      </div>
      <div class="data">
        <p class="info">{{ informationUser['full_name'] }}</p>
        <p class="info">{{ informationUser['birthday_str'] }}</p>
        <p class="info">{{informationUser['number']}}</p>
      </div>
    </div>
  </section>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";

export default defineComponent(
    {
      data: () => {
        return {
          informationUser: {}
        }
      },
      mounted() {
        axios.get('user').then(response => {
          this.informationUser = response.data

          let date = new Date(this.informationUser['birthday'])

          let day = date.getDate()
          let strDay = ''
          if (day < 10) strDay = `0${day}`

          let month = date.getMonth() + 1
          let strMonth = ''
          if (month < 10) strMonth = `0${month}`

          let year = date.getFullYear()

          this.informationUser['birthday_str'] = `${strDay}.${strMonth}.${year}`
        })
      }
    }
)
</script>

<style scoped>
.user{
  width: 1440px;
  margin: 72px auto 0 auto;
}
.user h1{
  font-size: 28px;
  color: #0F2B56;
}
.user .menu-user{
  display: flex;
  gap: 44px;
}

.user .menu-user .personal{
  color: #719FE7;
  text-decoration: none;
  font-size: 18px;
}
.user .menu-user .records{
  text-decoration: none;
  color: #7A8FAD;
  font-size: 18px;
}
.user .personal-data{
  display: flex;
  gap: 47px;
  margin-top: 50px;
  padding-bottom: 100px;
}
.user .personal-data .titles{
  display: flex;
  flex-direction: column;
  gap: 26px;
  color: #7A8FAD;
  font-size: 18px;
}
.user .personal-data .titles p{
  margin: 0;
}
.user .personal-data .data p{
  margin: 0;
}
.user .personal-data .data{
  font-size: 20px;
  color: #0F2B56;
  display: flex;
  flex-direction: column;
  gap: 23px;
  font-weight: bold;
}

.top-list{
  display: flex;
  gap: 41px;
  align-items: center;
}

.top-list .logout{
  text-decoration: none;
  font-family: 'Inter', sans-serif;
  font-size: 22px;
  font-weight: 500;
  color: #0F2B56;
}
</style>