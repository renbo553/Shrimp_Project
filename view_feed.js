function put_into_form (data , form_id) {
    //show data on 詳細資料_餵食
    console.log(data.get("id")) ;
    document.getElementById(form_id).elements["select_type"].value = data.get("shrimp") ;
    document.getElementById(form_id).elements["id"].value = data.get("id") ;
    document.getElementById(form_id).elements["date"].value = data.get("Date") ;
    document.getElementById(form_id).elements["location"].value = data.get('Tank') ;
    document.getElementById(form_id).elements["select_time"].value = data.get('time') ;
    document.getElementById(form_id).elements["select_work"].value = data.get("work") ;
    document.getElementById(form_id).elements["else_work"].value = data.get("else_work") ;
    document.getElementById(form_id).elements["male_shrimp"].value = data.get("No_Shrimp_Male") ;
    document.getElementById(form_id).elements["female_shrimp"].value = data.get("No_Shrimp_Female") ;
    document.getElementById(form_id).elements["dead_male_shrimp"].value = data.get("No_Dead_Male") ;
    document.getElementById(form_id).elements["dead_female_shrimp"].value = data.get("No_Dead_Female") ;
    document.getElementById(form_id).elements["peeling_male_shrimp"].value = data.get("No_Moults_Male") ;
    document.getElementById(form_id).elements["peeling_female_shrimp"].value = data.get("No_Moults_Female") ;
    document.getElementById(form_id).elements["avg_male_shrimp"].value = data.get("Avg_Weight_Male") ;
    document.getElementById(form_id).elements["avg_female_shrimp"].value = data.get("Avg_Weight_Female") ;
    document.getElementById(form_id).elements["total_weight"].value = data.get("Total_Weight") ;
    document.getElementById(form_id).elements["food_weight"].value = data.get("food_weight") ;
    document.getElementById(form_id).elements["food_remain"].value = data.get("food_remain") ;
    document.getElementById(form_id).elements["eating"].value = data.get("eating") ;
    document.getElementById(form_id).elements["FeedingRatio"].value = data.get("Feeding_Ratio") ;
    document.getElementById(form_id).elements["Observation"].value = data.get("Observation") ;
}