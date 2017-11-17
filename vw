CREATE VIEW view_nota_reciever AS SELECT r.receiver_id, r.cc_status, r.disposisi_status, n.nota_id, r.emp_num, e.emp_firstname, e.emp_lastname, e.emp_job, j.job_name, j.job_code, j.job_description
FROM nota_data n, hrms_employees e, hrms_job j, nota_receiver r
WHERE n.nota_id = r.nota_id
AND e.emp_num = r.emp_num
AND e.job_code = j.job_num

CREATE VIEW view_nota_examiner AS
SELECT ex.examine_id, n.nota_id, ex.examiner_id, e.emp_firstname, e.emp_lastname, e.emp_job, j.job_name, j.job_code, j.job_description
FROM nota_data n, hrms_employees e, hrms_job j, nota_examine ex
WHERE n.nota_id = ex.nota_id
AND e.emp_num = ex.examiner_id
AND e.job_code = j.job_num

CREATE VIEW view_nota_employees AS
SELECT 
e.emp_num, 
e.emp_firstname, 
e.emp_lastname, 
e.emp_job, 
j.job_name,
j.job_code, 
j.job_description,
e.org_code
FROM hrms_employees e, hrms_job j 
WHERE e.emp_job = j.job_num and e.emp_firstname <> "DEF"