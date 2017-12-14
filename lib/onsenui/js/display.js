//Button functions

function OnButtonClick(btn) {
        switch (btn){
            case 1:
                document.location.assign("map.html");
                break;
            case 2:
                document.location.assign("law.html");
                break;
            case 3:
                document.location.assign("education.html");
                break;
            case 4:
                document.location.assign("science.html");
                break;
            case 5:
                document.location.assign("medicine.html");
                break;
            case 6:
                document.location.assign("engineer.html");
                break;
            case 7:
                document.location.assign("agriculture.html");
                break;
            case 8:
                document.location.assign("common.html");
                break;
            default:
                document.location.assign("html/map.html");
                break;
        }
    }