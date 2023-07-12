import './../../bootstrap.js'

import { createApp } from 'vue'

import AttendanceBoard from './AttendanceBoard.vue'

const app = createApp({})
app.component('attendance-board',AttendanceBoard)
app.mount("#app")
