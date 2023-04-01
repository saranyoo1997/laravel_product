import amphurs from '../json/thai_amphures.json'
import tambons from '../json/thai_tambons.json'
document.addEventListener('DOMContentLoaded', function () {
    $('#province').on('change', function () {
        //console.log($(this).val());

        const arr = amphurs.RECORDS.filter((r) => {
            return r.province_id == $(this).val()
        });
        $('#amphur').html('');
        $('#amphur').append(`<option selected disabled >อำเภอ</option>`)

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
        $('#tambon').append(`<option selected disabled >ตำบล</option>`)
        arr.forEach(tambon=>{
            $('#tambon').append(`<option value="${tambon.id}">${tambon.name_th}</option>`)
        })
    


    });

    $('#tambon').on('change',function(){

        const zip_code = tambons.RECORDS.find(tambon=>tambon.id==$(this).val())
        $('#zip').val(zip_code.zip_code);
        // console.log(zip_code,$(this).val());
    })

    


});
