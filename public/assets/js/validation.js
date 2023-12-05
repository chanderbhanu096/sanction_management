$(document).ready(function()
{
     // Validation function start
     $('#sanction').submit(function(event)
     {
         if(!validateForm())
         {
             event.preventDefault();
         }
     });
});
function validateForm()
{
    let isValid=true;
    let selectedFY=$('#financial_year').val();
    let districtSelected=$('#district-list').val();
    let blockSelected=$('#block-list').val();
    let gpSelected=$('#panchayat-list').val();
    let newGP=$("input[name='newGP']:checked").val();
    let amount=$('#sanction').val();
    // Validate Financial Year
    if(selectedFY==="-1")
    {
        isValid=false;
        $("#financial_year").next(".error").remove();
        $("#financial_year").after("<span class='error '>Please select Finacial Year</span>");
    }
    else
    {
        $("#financial_year").next(".error").remove();
    }
    // Validate District
    if(districtSelected==="-1")
    {
        isValid=false;
        $('#district-list').next(".error").remove();
        $('#district-list').after("<span class='error'>Please select District</span>")
    }
    else
    {
        $('#district-list').next(".error").remove();
    }
    // validate Block
    if(blockSelected==="-1")
    {
        isValid=false;
        $('#block-list').next(".error").remove();
        $('#block-list').after("<span class='error'>Please select Block</span>")
    }
    else
    {
        $('#block-list').next(".error").remove();
    }

    // Validate Gram Panchayat
    if(gpSelected==="-1")
    {
        isValid=false;
        $('#panchayat-list').next(".error").remove();
        $('#panchayat-list').after("<span class='error'>Please select Block</span>")
    }
    else
    {
        $('#panchayat-list').next(".error").remove();
    }

    // Validate New GP field
    if(!newGP)
    {
        isValid=false;
        $("input[name='newGP']").parent().next(".error").remove();
        $("input[name='newGP']").parent().after("<span class='error'>Please select if Gram Panchayat is new of old.</span>");
    }
    else
    {
        $("input[name='newGP']").parent().next(".error").remove();
    }

    // Validate Sanction amount
    console.log(amount);
    if(amount < 0 || amount==="0")
    {
        isValid=false;
        $('#sanction').next(".error").remove();
        $('#sanction').after("<span class='error'>Please enter the valid amount</span>")
    }
    else
    {
        $('#sanction').next(".error").remove();
    }
    return false;
}