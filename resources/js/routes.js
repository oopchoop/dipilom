import MainPage from "../views/pages/MainPage.vue";
import Doctors from "../views/pages/Doctors.vue";
import Autorization from "../views/pages/Autorization.vue";
import Registration from "../views/pages/Registration.vue";
import Contacts from "../views/pages/Contacts.vue";
import User from "../views/pages/User.vue";
import UserRecords from "../views/pages/UsersRecords.vue";
import ServicesAndPrice from "../views/pages/ServicesAndPrice.vue";
import Therapist from "../views/pages/Therapist.vue";
import Gynecologist from "../views/pages/Gynecologist.vue";
import Cardiologist from "../views/pages/Cardiologist.vue";
import Gastroenterologist from "../views/pages/Gastroenterologist.vue";
import Surgeon from "../views/pages/Surgeon.vue";
import Virologist from "../views/pages/Virologist.vue";
import AdminSchedules from "../views/pages/Adminschedules.vue";


const routes =
    [
        {
            path: '/',
            component: MainPage
        },
        {
            path: '/doctors',
            component: Doctors
        },
        {
            path: '/autorization',
            component: Autorization
        },
        {
            path: '/registration',
            component: Registration
        },
        {
            path: '/contacts',
            component: Contacts
        },

        {
            path: '/profile',
            component: User
        },
        {
            path: '/userrecords',
            component: UserRecords
        },
        {
            path: '/servicesandprice',
            component: ServicesAndPrice
        },
        {
            path: '/therapist',
            component: Therapist
        },
        {
            path: '/gynecologist',
            component: Gynecologist
        },
        {
            path: '/cardiologist',
            component: Cardiologist
        },
        {
            path: '/gastroenterologist',
            component: Gastroenterologist
        },
        {
            path: '/surgeon',
            component: Surgeon
        },
        {
            path: '/virologist',
            component: Virologist
        },
        {
            path: '/adminsch',
            component: AdminSchedules
        }

    ];

export default routes