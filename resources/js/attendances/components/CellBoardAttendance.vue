<script setup>
import { ref } from "vue";
import { AttendanceStatus, Full, Half, Ro } from "../../utils/constants.js";
import _ from "lodash";

const attendance = ref(Ro)
const getAttendanceStatusLabel = () => {
    const status = AttendanceStatus.find(item => item.value === attendance.value)
    return _.get(status, 'label', '')
};
const getAttendanceStatusColor = () => {
    const status = AttendanceStatus.find(item => item.value === attendance.value)
    return _.get(status, 'color', '')
};

const setAttendance = (status) => {
    attendance.value = status
};

</script>

<template>
    <div class="cell-board-attendance dropdown ">
        <div class="nav-item cell-item-wrapper nav-item-dropdown-lg dropdown">
            <a href="#" class=" cell-item navbar-nav-link align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-lg-inline-block" :class="getAttendanceStatusColor()">{{ getAttendanceStatusLabel() }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-end">
                <button href="#" class="dropdown-item" @click="setAttendance(Full)">
                    <i class="ph-user-circle me-2"></i>
                    1 công
                </button>
                <div class="dropdown-divider"></div>
                <button href="#" class="dropdown-item" @click="setAttendance(Half)">
                    <i class="ph-user-circle me-2"></i>
                    1/2 công
                </button>
                <div class="dropdown-divider"></div>
                <button href="#" class="dropdown-item text-danger" @click="setAttendance(Ro)">
                    <i class="ph-x-circle me-2"></i>
                    Nghỉ
                </button>
            </div>
        </div>


    </div>
</template>

<style scoped lang="scss">
.cell-board-attendance {
    cursor: pointer;
    width: 100%;
    height: 47px;

    .cell-item-wrapper {
        display: inline-block;
        width: 100%;
        height:100%;
    }

    .cell-item {
        justify-content: center;
        width: 100%;
        height: 100%;
    }
}
</style>
