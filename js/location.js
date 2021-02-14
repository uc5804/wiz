function check_input(){
	if(!document.location_form.region.value){
		alert("스터디 과목을 작성하세요");
		document.location_form.region.focus();
		return;
	}
	if(!document.location_form.s_location.value){
		alert("스터디 요약을 작성하세요");
		document.location_form.s_location.focus();
		return;
	}
	if(!document.location_form.upfile.value){
		alert("스터디 모집 인원을 작성하세요");
		document.location_form.upfile.focus();
		return;
	}
	if(!document.location_form.price_hr.value){
		alert("스터디 지역을 작성하세요");
		document.location_form.price_hr.focus();
		return;
	}
	if(!document.location_form.s_location.value){
		alert("스터디 장소를 작성하세요");
		document.location_form.s_location.focus();
		return;
	}
	if(!document.location_form.price_day.value){
		alert("스터디 장소를 작성하세요");
		document.location_form.price_day.focus();
		return;
	}
	if(!document.location_form.price_hr.value){
		alert("스터디 장소를 작성하세요");
		document.location_form.price_hr.focus();
		return;
	}
	if(!document.location_form.price_month.value){
		alert("스터디 장소를 작성하세요");
		document.location_form.price_month.focus();
		return;
	}
	if(!document.location_form.etc.value){
		alert("스터디 장소를 작성하세요");
		document.location_form.etc.focus();
		return;
	}
	//첨부파일은 사용자의 선택에 의해서 존재할 수도 있고 없을 수도 있음(필수사항 아님)

	document.location_form.submit();



	
}

