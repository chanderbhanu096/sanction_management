$('document').ready(function()
{
    $('#progress_form').submit(function()
    {
        if(!validateForm())
        {
            event.preventDefault();
        }
    });

    function validateForm()
    {
        isValid=true;
        let percentage_san=$('#p_completed_per').val();
        let isCompleted=$('#isCompleted').val();
        let uc_file=$('#uc_file')[0];
        let selectedFile=uc_file.files[0];
        

        // Validate Percentage
        if(!isValidPercentage(percentage_san))
        {
            isValid=false;
            $("#p_completed_per").next(".error").remove();
            $("#p_completed_per").after("<span class='error'>Please enter valid percentage value</span>");
        }
        else
        {
            $("#p_completed_per").next(".error").remove();
        }

        // Validate isCompleted
        if(isCompleted==='-1')
        {
            isValid=false;
            console.log("I am in selected");
            $("#isCompleted").next(".error").remove();
            $("#isCompleted").after("<span class='error'>Please select.</span>"); 
        }
        else
        {
            $("#isCompleted").next(".error").remove();
        }
       
        if(isCompleted!==-1)
        {
              // Validate If UC file is selected
        if(!selectedFile)
        {
            isValid=false;
            $("#uc_file").next(".error").remove();
            $("#uc_file").after("<span class='error'>Please select a file.</span>");
        }
        else if(selectedFile.type!=="application/pdf")
        {   
            isValid=false;
            $("#uc_file").next(".error").remove();
            $("#uc_file").after("<span class='error'>Please select a PDF file.</span>");
        }
        else if(selectedFile.size>2*1024*1024)
        {
            isValid=false;
            $("#uc_file").next(".error").remove();
            $("#uc_file").after("<span class='error'>File size should not exceed 2 MB.</span>");
        }
        else
        {
            $("#uc_file").next(".error").remove();
        }
        }
        isValid=validateProgressImage();
        return isValid;
    }

    function isValidPercentage(value) {
    var percentageRegex = /^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$/;
    return percentageRegex.test(value);
  }

  function validateProgressImage()
  {
    let images=$('#imageInput')[0];
    let files=images.files;
    if(files.length>3)
    {
        $("#imageInput").next(".error").remove();
        $("#imageInput").after("<span class='error'>You can select only 3 images.</span>");
        return false;
    }
    for( let i=0;i<files.length;i++)
    {
        let file=files[i]
        if(file.size>400*400)
        {
            $("#imageInput").next(".error").remove();
            $("#imageInput").after("<span class='error'>Image size should be less than 400Kb.</span>");
            return false;
        }
        let allowedTypes=['image/jpeg', 'image/jpg', 'image/png'];

        if(allowedTypes.indexOf(file.type)===-1)
        {
            $("#imageInput").next(".error").remove();
            $("#imageInput").after("<span class='error'>Images of only jpeg, jpg and png are allowed.</span>");
            return false; 
        }
    }
    $("#imageInput").next(".error").remove();
    return true;
  }

});