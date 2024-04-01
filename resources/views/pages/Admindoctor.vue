<template>
  <section class="user">
    <div class="top-list">
      <h1>Администратор</h1>
      <a href="/logout" class="logout">Выход</a>
    </div>
    <div class="menu-user">
      <router-link to="/adminsch" class="personal">Расписание</router-link>
      <router-link to="/admintic" class="personal">Записи на прием</router-link>
      <router-link to="/admindoc" class="personal select">Добавить врача</router-link>
    </div>
    <form action="/makeDoctor" method="post" class="personal-data" enctype="multipart/form-data">
      <input type="hidden" name="_token" :value="codeToken">
      <div class="form-group">
        <p>Выберите специализацию</p>
        <select name="doctor_special_id" id="special_id">
          <option value="1">Терапевт</option>
          <option value="2">Гинеколог</option>
          <option value="3">Кардиолог</option>
          <option value="4">Гастроэнтеролог</option>
          <option value="5">Хирург</option>
          <option value="6">Вирусолог</option>
        </select>
      </div>
      <div class="form-group">
        <p>ФИО врача</p>
        <input type="text" name="doctor_name" placeholder="ФИО">
      </div>
      <div class="form-group">
        <p>Фото</p>
        <input type="file" name="doctor_photo">
      </div>
      <div class="form-group">
        <p>Стаж</p>
        <input type="number" name="doctor_experience" placeholder="Стаж">
      </div>
      <div class="form-group">
        <p>Номер телефона</p>
        <input type="text" name="doctor_number" placeholder="Номер тел.">
      </div>
      <div class="form-group">
        <p>Пароль</p>
        <input type="password" name="doctor_password" placeholder="Пароль">
      </div>
      <input type="submit" value="Добавить врача">
    </form>
  </section>
</template>

<script lang="ts">
import {defineComponent} from 'vue'
import axios from "axios";

export default defineComponent({
  data() {
    return {
      codeToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      doctors: [],
      doctorId: '',
      dates: [],
      times: []
    }
  },
  mounted(){
    axios.get('/getAllDoctors').then(response => {this.doctors = response.data})
  },
  methods: {
    changeDoctor() {
      this.$route.params.dateId = ''

      this.doctorId = document.querySelector('#user_id').value
      this.times = []

      axios.get(`/getDates/${this.doctorId}`).then(response =>
      {
        this.dates = response.data

        this.dates.forEach((v, k) => {

          this.dates[k]['day'] = v['date'].split('-')[2]
          this.dates[k]['month'] = v['date'].split('-')[1]
        })
      })
    },
    changeDate(id) {
      axios.get(`/getDateInfo/${id}`).then(response => {this.times = response.data})
    }
  }
})
</script>

<style scoped>
p{
  margin: 0;
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 24px;
}



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
  color: #7A8FAD;
  text-decoration: none;
  font-size: 18px;
}

.user .menu-user .select{
  color: #719FE7;
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

.personal-data{
  display: flex;
  flex-direction: column;
  gap: 19px;
}

.personal-data input, select{
  background-color: #ffffff;
  color: #7A8FAD;
  border: none;
  box-shadow: 0 1px 1px 0 rgb(155, 155, 155);
  border-radius: 11px;
  font-size: 20px;
  padding: 16px 0 16px 26px;
  width: 350px;
}

.personal-data input{
  width: 324px;
}

.personal-data input[type='submit']{
  background-color: #80B4FF;
  color: white;
  font-weight: bold;
  font-size: 20px;
  width: 256px;
  border-radius: 64px;
  margin-top: 20px;
  padding: 15px 23px;
}

.form-group{
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.top-list .logout{
  text-decoration: none;
  font-family: 'Inter', sans-serif;
  font-size: 22px;
  font-weight: 500;
  color: #0F2B56;
}
</style>