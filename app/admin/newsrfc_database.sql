

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_img` text NOT NULL,
  `banner_top_msg` text NOT NULL,
  `banner_headline` text NOT NULL,
  `banner_btm_msg` text NOT NULL,
  `banner_button` varchar(100) NOT NULL,
  `banner_button_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO banner VALUES("1","banner1.png","<span>Money </span><span>Energy </span><span>Time </span>","Save money  <br/>Save time","We Provide Best TAX Compliances with Lowest Price","About Us","about-us.php");
INSERT INTO banner VALUES("2","banner2.png","  <span>TAX </span><span>ITR </span><span>GST </span>","Best Tax Consultant","Best TAX Consultation in India","About Us","about-us.php");
INSERT INTO banner VALUES("3","banner3.png","<span>Connect </span><span>Lead </span><span>Grow </span>","Would you like to start                                   business with us?","Join Our Reliable Franchise","Join Now","franchise.php");



CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` text NOT NULL,
  `blog_slug` text NOT NULL,
  `blog_tag` text NOT NULL,
  `blog_img` text NOT NULL,
  `blog_meta_descp` longtext NOT NULL,
  `blog_descp` longtext NOT NULL,
  `blog_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `branch_location` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(190) NOT NULL,
  `branch_lattitude` float NOT NULL,
  `branch_longitude` float NOT NULL,
  `branch_mobile` varchar(200) NOT NULL,
  `branch_address` text NOT NULL,
  `branch_city` varchar(200) NOT NULL,
  `branch_state` varchar(200) NOT NULL,
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `branch_code` (`branch_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `business_loan` (
  `business_loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pin` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(190) NOT NULL,
  `state` varchar(190) NOT NULL,
  `shop_name` text NOT NULL,
  `shop_location` text NOT NULL,
  `enquiry_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`business_loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_code` varchar(190) NOT NULL,
  `category_name` text NOT NULL,
  `category_slug` text NOT NULL,
  `category_description` text NOT NULL,
  `category_icon` varchar(100) NOT NULL,
  `category_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO category VALUES("1","111","Start Your Business","start-your-business","Choosing the right business structure is as important as any other business-related activity.","start-a-business.png","ACTIVE");
INSERT INTO category VALUES("2","112","Licenses and Registration  ","licenses-and-registration  ","Every business must register themselves as part of the legal compliance. ","license.png","ACTIVE");
INSERT INTO category VALUES("3","113","Compliance Management","compliance-management","Compliance is really about demonstrating a business following regulations and best practices according to various standards. Compliance means conforming to a rule, such as a specification, policy, standard or law.","compliance.png","ACTIVE");
INSERT INTO category VALUES("4","114","IT Services","it-services","We provides the full spectrum of finance accounting services that help to streamline, organize, and integrate financial data that is crucial to the smooth and efficient running of a business.","it-service.png","ACTIVE");
INSERT INTO category VALUES("5","115","Investment Advisory","investment-advisory","We specializes in advising clients on the buying and selling of securities, in exchange for a fee.Taxcons connects you with multiple lending partners across India.","investment.png","ACTIVE");
INSERT INTO category VALUES("6","116","Loan Syndication","loan-syndication","We connect and help you to meet the document requiremnets (CMA Data, Project Report etc.) of financial institutions for project finance or business loan.","loan.png","ACTIVE");
INSERT INTO category VALUES("10","f5006c7","Articles/Notifications","articles-notifications","Latest Amendments and Articles for knowledge update.","articlesnotifications-61f.png","ACTIVE");



CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_no` text NOT NULL,
  `contact_email` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_shrt_location` text NOT NULL,
  `contact_map` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO contact VALUES("1","8103934917","support@srfcnbfc.com","29B-7 PARISHRAM TOWER, IN FRONT OF T.V. TOWER, ANUPAM NAGAR. SHANKAR NAGAR , Raipur, Chhattisgarh Pincode-492007","Raipur, Chhattisgarh","<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.3483201317413!2d81.66547331487293!3d21.2576754858748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a28dd67dcf7c807%3A0xfc17c2440b39bd60!2sShriram%20Finance%20Corporation%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1676949809114!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>");



CREATE TABLE `enquiry` (
  `enq_id` int(11) NOT NULL AUTO_INCREMENT,
  `enq_name` varchar(200) NOT NULL,
  `enq_email` varchar(200) DEFAULT NULL,
  `enq_mobile` varchar(200) NOT NULL,
  `enq_msg` longtext NOT NULL,
  `enq_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`enq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_code` text NOT NULL,
  `faq_ques` text NOT NULL,
  `faq_ans` longtext NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO faq VALUES("2","S-799a21d","sbdfnbdsfhjs dfjh sdfjhsdf sdf","isufhisdf bsdjhbsdf jhsdfsdn fnsdfsnbsdbf sd bsdv f
dasfsdfdfs mmsdfjbsdfsdf sdfd");



CREATE TABLE `franchise` (
  `fr_id` int(11) NOT NULL,
  `fr_name` text NOT NULL,
  `fr_email` text DEFAULT NULL,
  `fr_mobile` bigint(20) NOT NULL,
  `fr_business_name` text DEFAULT NULL,
  `fr_business_nature` text DEFAULT NULL,
  `fr_business_location` text DEFAULT NULL,
  `fr_adhar_card` text DEFAULT NULL,
  `fr_pan_card` text DEFAULT NULL,
  `fr_msg` mediumtext DEFAULT NULL,
  `fr_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `investor` (
  `investor_id` int(11) NOT NULL AUTO_INCREMENT,
  `investor_name` varchar(190) NOT NULL,
  `investor_img` text NOT NULL,
  PRIMARY KEY (`investor_id`),
  UNIQUE KEY `investor_name` (`investor_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `job_resume` (
  `resume_id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_name` text NOT NULL,
  `candidate_mobile` bigint(50) NOT NULL,
  `candidate_email` text NOT NULL,
  `vacancy_id` varchar(200) NOT NULL,
  `candidate_address` text NOT NULL,
  `candidate_resume` varchar(200) NOT NULL,
  `candidate_status` enum('APPLIED','APPROVE','REJECT') NOT NULL DEFAULT 'APPLIED',
  `submit_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`resume_id`),
  UNIQUE KEY `candidate_mobile` (`candidate_mobile`,`candidate_email`,`vacancy_id`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `personal_loan` (
  `personal_loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pin` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(190) NOT NULL,
  `state` varchar(190) NOT NULL,
  `job_designation` varchar(190) NOT NULL,
  `company` text NOT NULL,
  `job_location` varchar(190) NOT NULL,
  `anual_salary` varchar(190) NOT NULL,
  `enquiry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`personal_loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `refinance_loan` (
  `refinance_loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pin` int(11) NOT NULL,
  `city` varchar(190) NOT NULL,
  `state` varchar(190) NOT NULL,
  `address` text NOT NULL,
  `bike_brand` varchar(190) NOT NULL,
  `bike_model_name` varchar(190) NOT NULL,
  `bike_reg_no` text NOT NULL,
  `bike_reg_year` year(4) NOT NULL,
  `enquiry_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`refinance_loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_code` varchar(150) NOT NULL,
  `service_name` text NOT NULL,
  `service_slug` text NOT NULL,
  `service_headline` text NOT NULL,
  `service_shrt_description` mediumtext NOT NULL,
  `service_description` longtext NOT NULL,
  `service_img` text NOT NULL,
  `service_status` varchar(100) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `siteadmin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_sec_que` int(11) NOT NULL,
  `admin_status` varchar(200) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_code` varchar(190) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_code` (`admin_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO siteadmin VALUES("1","admin","admin@gmail.com","1234","1","ACTIVE","2022-01-22 06:54:18","123345");



CREATE TABLE `social_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO social_links VALUES("1","https://www.facebook.com/srfcnbfc/","https://twitter.com/finance_ram","","","","");
INSERT INTO social_links VALUES("2","https://www.facebook.com/srfcnbfc/","https://twitter.com/finance_ram","","","","");



CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` text NOT NULL,
  `person_designation` text NOT NULL,
  `testimonial_description` mediumtext NOT NULL,
  `person_img` varchar(100) NOT NULL,
  `testimonial_status` enum('ACTIVE','BLOCK') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO testimonial VALUES("1","Maheswar Singh Rajput","Raipur","The Process of application, approval and disbursal was quick. The Loan officer created a customized solution for my specific needs. You made the process of getting a loan simple - right from documentation to disbursal and it hence saved a lot of my time."","maheswar-singh-rajput.png","ACTIVE");
INSERT INTO testimonial VALUES("2","Chaganlal Verma","Raipur","The Process of application, approval and disbursal was quick. The Loan officer created a customized solution for my specific needs. You made the process of getting a loan simple - right from documentation to disbursal and it hence saved a lot of my time."","chagan-lal-verma.png","ACTIVE");
INSERT INTO testimonial VALUES("3","Rahul Singh","Bhilai","Your variety of loan products available made it easier for small businessmen like me with the usual ups and down of income, to operate and grow my business profitably with options that cater to every need. Shri ram finance turned to be the best choice after all","rahul-singh.png","ACTIVE");
INSERT INTO testimonial VALUES("4","Ranjna Gahare","Raipur",""Great and easy to deal. I found them Very Friendly & helpful.We were very impressed with the personalised professional service and advice given to us, and how you have tailored this specifically to suit our situation and future needs. ","ranjana-gahare.png","ACTIVE");



CREATE TABLE `tractor_refinance` (
  `tractor_ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pin` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(190) NOT NULL,
  `state` varchar(190) NOT NULL,
  `tractor_brand` varchar(190) NOT NULL,
  `tractor_model_name` varchar(190) NOT NULL,
  `tractor_reg_no` varchar(190) NOT NULL,
  `tractor_reg_year` year(4) NOT NULL,
  `enquiry_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`tractor_ref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `two_wheeler_finance` (
  `two_finance_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pin` int(5) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(190) NOT NULL,
  `state` varchar(190) NOT NULL,
  `bike_brand` varchar(190) NOT NULL,
  `bike_model` varchar(190) NOT NULL,
  `enquiry_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`two_finance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `vacancy` (
  `vacancy_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` text NOT NULL,
  `job_title_slug` text NOT NULL,
  `job_designation` text NOT NULL,
  `candidate_level` varchar(200) NOT NULL,
  `job_timing` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `job_responsibility` longtext NOT NULL,
  `job_img` text NOT NULL,
  PRIMARY KEY (`vacancy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `website_seo` (
  `id` int(11) NOT NULL,
  `web_header` longtext NOT NULL,
  `web_footer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO website_seo VALUES("1","","");

