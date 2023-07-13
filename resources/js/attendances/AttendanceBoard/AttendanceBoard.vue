<script setup>
import { onMounted, ref, watch } from "vue";
import moment from "moment";
import { useHelper } from "../../utils/helper.js";
import { FORMAT_MONTH, FORMAT_MONTH_MINUS } from "../../utils/constants.js";
import CellBoardAttendance from "../components/CellBoardAttendance.vue";
import api from "../../api"

const props = defineProps(['workers'])

const { formatDate } = useHelper()

const workers = ref([])

const date = ref(null)

const daysInMonth = ref(0)

const loading = ref(false)

onMounted(() => {
    workers.value = JSON.parse(props.workers)
    date.value = moment()
    handleGetAttendanceWorker()
})

watch(props.workers, () => {
    workers.value = JSON.parse(props.workers)
})

watch(date, (date) => {
    daysInMonth.value = date.daysInMonth()
})

const handleGetAttendanceWorker = async () => {
    if (!loading.value) {
        loading.value = true
        const attendance = api.getAttendancesMonth(formatDate(date, FORMAT_MONTH_MINUS))
        console.log(attendance)
        loading.value = false
    }
}

</script>

<template>
    <div class="card">
        <div class="card-header">
            <div class="title bold"><i class="ph-calendar me-1"></i> Bảng chấm công</div>
        </div>
        <div class="card-body">
            <div class="board-wrapper">
                <div class="board-wrapper__header">
                    <div class="board-title text-center">
                        <h4>Tháng {{ formatDate(date, FORMAT_MONTH) }}</h4>
                    </div>
                </div>
                <div class="board-wrapper__content">
                    <table class="table table-bordered board-table table-responsive-md">
                        <thead>
                        <tr>
                            <th class="worker-name">

                            </th>
                            <th v-for="day in daysInMonth" :key="day">
                                {{ day }}
                            </th>
                            <th class="text-center total">
                                Tổng
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(worker, index) in workers" :key="worker.id">
                            <td class="worker-name">{{ index + 1 }}. {{ worker.name }}</td>
                            <td class="worker-attendance" v-for="day in daysInMonth" :key="day">
                                <cell-board-attendance></cell-board-attendance>
                            </td>
                            <td class="text-center total">
                                10
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
@import "../../../css/variables";

.board-wrapper__content {
    max-width: 100vw;
    max-height: calc(100vh - 315px);
    overflow: auto;
    border: 1px solid $colorPending;
    border-radius: 2px;

    .board-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;

        thead {
            position: sticky;
            z-index: 10;
            background: $colorGrey;
            top: 0;
        }

        .worker-name {
            min-width: 200px;
            z-index: 9;
            background: $colorBg;
            position: sticky;
            left: 0; /* Giữ cột đầu tiên ở vị trí cố định bên trái */
        }

        .total {
            z-index: 9;
            background: $colorBg;
            position: sticky;
            right: 0; /* Giữ cột đầu tiên ở vị trí cố định bên trái */
        }

        td {
            &.worker-attendance {
                padding: 0;
            }
        }

    }

}
</style>
