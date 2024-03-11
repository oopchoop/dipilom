<template xmlns="http://www.w3.org/1999/html">
  <section class="form">
    <div class="auto-reg">
      <router-link to= "/autorization" class="autorization-title">Авторизация</router-link>
      <router-link to= "/registration" class="registration-title">Регистрация</router-link>
    </div>
    <form action="/registr" method="post" class="registration">
      <input type="hidden" name="_token" :value="codeToken">
      <input type="text" name="full_name" placeholder="ФИО">
      <input type="text" name="birthday" placeholder="Дата рождения" onfocus="(this.type='date')">
      <input type="text" name="number" placeholder="Телефон">
      <input type="password" name="password" placeholder="Пароль">
      <input type="password" name="password_confirmation" placeholder="Повторите пароль">
      <input type="submit" value="Зарегистрироваться">
    </form>
  </section>
</template>

<script lang="ts">
import {defineComponent} from 'vue'
import axios from "axios";

export default defineComponent({
  data() {
    return {
      codeToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  },
  mounted(){
  }
})

</script>

<style scoped>
.form{
  display: flex;
  flex-direction: column;
  gap: 36px;
  align-items: center;
  justify-content: center;
  margin: 130px auto;
}
.form .auto-reg{
  display: flex;
  gap: 79px;
  align-items: center;
}
.form .auto-reg .registration-title{
  text-decoration: none;
  color: #0F2B56;
  font-size: 24px;
}
.form .auto-reg .autorization-title{
  font-weight: bold;
  text-decoration: none;
  color: #0F2B56;
  font-size: 24px;
}
.form .registration{
  display: flex;
  flex-direction: column;
  gap: 19px;
  align-items: center;
}
.form .registration input{
  width: 567px;
  background-color: #ffffff;
  color: #7A8FAD;
  border: none;
  box-shadow: 0 1px 1px 0 rgb(155, 155, 155);
  border-radius: 6px;
  font-size: 20px;
  padding:14px 30px;
}
.form .registration input[type='submit']{
  background-color: #80B4FF;
  color: white;
  font-weight: bold;
  font-size: 20px;
  width: 256px;
  border-radius: 64px;
  margin-top: 20px;
  padding: 15px 23px;
}
</style>