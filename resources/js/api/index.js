import { useHelper } from "../utils/helper.js";

const { getMeta } = useHelper()

export const apiAxios = axios.create()
apiAxios.defaults.baseURL = `${window.location.origin}`
apiAxios.defaults.headers.post['Content-type'] = "application/json"
apiAxios.defaults.headers.post['Content-type'] = getMeta('csrf-token')

export default {
    getAttendancesMonth(date) {
        return apiAxios({
            method: 'get',
            url: `/attendances/workers/${date}`
        })
    }
}
