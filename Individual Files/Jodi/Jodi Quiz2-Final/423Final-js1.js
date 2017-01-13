// Jodi L. Hess CSC423  Final Exam Q#1 12/12/16

///  Vendor Name   /////////

function checkVendor(cv) {
  if (cv.match(/^[a-zA-Z0-9 ])) {
               return;
  } else {
         alert("Invalid VendorName - please enter letter, numbers or a space");
         return false;
       }
}

////  Vendor Item Name /////////////

 function checkItem(ci) {
    if (ci.match(/^[a-zA-Z0-9 .])  {
               return;
   }
    else  {
           alert("Invalid Vendor Item Name");
           return false;
        }
}

/////// Vendor Current Price   //////////////

function checkPrice(cp) {
  if (cp.match(/[0-9]/)))    {
          return false;
  }
}
