// Common Javascript functions
function setCheckboxes(cbObj, objName) {
  objsCollection = document.getElementsByName(objName);
  for (idx=0; idx<objsCollection.length; idx++) { 
    obj = objsCollection[idx];
    if (obj.type == "checkbox" && obj != cbObj)
      obj.checked = cbObj.checked;
  }
}