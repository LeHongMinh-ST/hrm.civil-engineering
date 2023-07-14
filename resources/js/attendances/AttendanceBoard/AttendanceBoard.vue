<script setup>
import { onMounted, ref, watch } from "vue";
import moment from "moment";
import { useHelper } from "../../utils/helper.js";
import { FORMAT_MONTH, FORMAT_MONTH_MINUS } from "../../utils/constants.js";
import CellBoardAttendance from "../components/CellBoardAttendance.vue";
import api from "../../api"
import _ from "lodash";

const prop = defineProps(['imageDefault'])
console.log(prop)
const { formatDate } = useHelper()

const workers = ref([])

const date = ref(null)

const daysInMonth = ref(0)

const loading = ref(false)

onMounted(() => {
    date.value = moment()
    handleGetAttendanceWorker()
})


watch(date, (date) => {
    daysInMonth.value = date.daysInMonth()
})

const handleGetAttendanceWorker = async () => {
    if (!loading.value) {
        loading.value = true
        const response = await api.getAttendancesMonth(formatDate(date, FORMAT_MONTH_MINUS))
        workers.value = _.get(response, 'data.data', [])
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
                    <table v-if="!workers.length > 0" class="table table-bordered board-table table-responsive-md">
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
                        <tbody >
                        <tr v-for="(worker, index) in workers" :key="worker.id">
                            <td class="worker-name">{{ index + 1 }}. {{ worker.name }}</td>
                            <td class="worker-attendance" v-for="attendance in worker.attendances" :key="attendance.id">
                                <cell-board-attendance :status="attendance.status"></cell-board-attendance>
                            </td>
                            <td class="text-center total">
                                10
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div v-else class="empty-table text-center">
                        <div class="image-empty">
                            <img :src="imageDefault"
                                 width="300"    alt="">
                        </div>
                        <div class="text-empty">Không có bản ghi!</div>
                    </div>
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
