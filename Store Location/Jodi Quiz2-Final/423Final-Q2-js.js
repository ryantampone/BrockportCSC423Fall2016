// Jodi L. Hess CSC423  Final Exam Q#1 12/12/16


///  Vendor Name   /////////

function checkVendor(cv) {
  if (cv.match(/^[a-zA-Z0-9 ])) {
               return;
  } else {
         errorMessage = "Invalid VendorName - please enter letter, numbers or a space";
         alert(errorMessage);
         return false;
       }
}

////  Vendor Item Name /////////////

 function checkItem(ci) {
    if (ci.match(/^[a-zA-Z0-9 .])  {
               return;
   }
    else  {
           errorMessage  = "Invalid Vendor Item Name";
           alert(errorMessage);
           return False;
        }
}
      
