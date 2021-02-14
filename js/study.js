function check_input(){
	if(!document.study_form.subject.value){
		alert("스터디 과목을 작성하세요");
		document.study_form.subject.focus();
		return;
	}
	if(!document.study_form.summary.value){
		alert("스터디 요약을 작성하세요");
		document.study_form.summary.focus();
		return;
	}
	if(!document.study_form.mem_num.value){
		alert("스터디 모집 인원을 작성하세요");
		document.study_form.mem_num.focus();
		return;
	}
	if(!document.study_form.region.value){
		alert("스터디 지역을 작성하세요");
		document.study_form.region.focus();
		return;
	}
	if(!document.study_form.s_location.value){
		alert("스터디 장소를 작성하세요");
		document.study_form.s_location.focus();
		return;
	}
	//첨부파일은 사용자의 선택에 의해서 존재할 수도 있고 없을 수도 있음(필수사항 아님)

	document.study_form.submit();



	
}

