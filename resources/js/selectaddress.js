import { zip } from 'lodash';
import amphurs from '../json/thai_amphures.json'
import tambons from '../json/thai_tambons.json'
document.addEventListener('DOMContentLoaded', function () {
    $('#province').on('change', function () {
        //console.log($(this).val());

        const arr = amphurs.RECORDS.filter((r) => {
            return r.province_id == $(this).val()
        });
        $('#amphur').html('');
        arr.forEach(amphur=>{
            $('#amphur').append(`<option value="${amphur.id}">${amphur.name_th}</option>`)

        })

    });

    $('#amphur').on('change', function () {
        //console.log($(this).val());

        const arr = tambons.RECORDS.filter((r) => {
            return r.amphure_id == $(this).val()
        });
        $('#tambon').html('');
        arr.forEach(tambon=>{
            $('#tambon').append(`<option value="${tambon.id}">${tambon.name_th}</option>`)
        })
    });

    


});
