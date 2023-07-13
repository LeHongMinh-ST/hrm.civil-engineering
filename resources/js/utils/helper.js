import { FORMAT_DATE } from "./constants.js";
import moment from "moment";

export function useHelper() {

    const formatDate = (date, format = FORMAT_DATE) => {
        if (!date) return ''

        return moment(date).format(format)
    }

    const getMeta = (metaName) => {
        const metas = document.getElementsByTagName('meta');

        for (let i = 0; i < metas.length; i++) {
            if (metas[i].getAttribute('name') === metaName) {
                return metas[i].getAttribute('content');
            }
        }

        return '';
    }

    return {
        formatDate,
        getMeta
    }
}
