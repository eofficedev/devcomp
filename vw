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

CREATE VIEW `view_nota_informasi_dash` as
SELECT
	`r`.`nota_id` AS `nota_id`,
  `r`.`nota_number` AS `nota_number`,
  `r`.`nota_perihal` AS `nota_perihal`,
  CONCAT(`e`.`emp_firstname`, ' ', `e`.`emp_lastname`) AS `sender_name`,
  `e`.`emp_email` AS `sender_email`,
  CONCAT(`toe`.`emp_firstname`, ' ', `toe`.`emp_lastname`) AS `receiver_name`,
  `toe`.`emp_email` AS `receiver_email`,
  (SELECT MAX(`exam_date`) AS `exam_date` FROM `nota_examine` WHERE `nota_id` = `r`.`nota_id` GROUP BY `nota_id`) AS `exam_date`
FROM
	(
    (
      `nota_data` `r` 
      JOIN `hrms_employees` `e`
    ) 	
    JOIN `hrms_job` `j`
    JOIN `nota_receiver` `to` ON `r`.`nota_id` = `to`.`nota_id` 
    JOIN `hrms_employees` `toe` ON `to`.`emp_num` = `toe`.`emp_num`        
  ) 
WHERE
  (
    (`r`.`nota_sender_num` = `e`.`emp_num`) AND(`e`.`emp_job` = `j`.`job_num`)
    AND (`to`.`cc_status` = 0)
  )