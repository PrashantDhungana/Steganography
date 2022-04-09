


**TRIBHUVAN UNIVERSITY**

**Institute of Science and Technology**

**Texas International College**


**A Final Year Project Report**

**On**

**“Steggy”**

**Under the Supervision of**

**Mr. Rom Kant Pandey**

**Submitted To:**

**Department of Computer Science and Information Technology**

**Texas International College**

**In partial fulfillment of the requirement for the bachelor’s degree in**

**Computer Science and Information Technology**


**Submitted By:**

**Prashant Sharma Dhungana (15589/074)**

**Rabi Neupane (15592/074)**

**Sumit Dulal (15602/074)**


**April 9, 2022**
#


# **LETTER OF APPROVAL**

This is to certify that this project prepared by **Prashant Sharma Dhungana (15589/074), Rabi Neupane (15592/074) and Sumit Dulal (10569/070)** entitled "**Steggy**" in partial fulfillment of the** requirements for the degree of B.Sc. in Computer Science and Information Technology has been well studied. In our opinion, it is satisfactory in the scope and quality as a project for the required degree.


|<p></p><p></p><p></p><p>……………………………..</p><p>**Mr. Rom kant Pandey**</p><p>Supervisor </p><p>Texas Int’l College</p><p>Chabahil, Kathmandu</p><p></p><p></p>||<p></p><p></p><p></p><p>……………………………..</p><p>**Mr. Kumar Poudyal**</p><p>HOD, CSIT</p><p>Texas Int’l College</p><p>Chabahil, Kathmandu</p><p></p>|
| :- | :- | :- |
|<p></p><p></p><p></p><p></p><p>……………………………..</p><p>**Mr. Sarbin Sayami**</p><p>External Supervisor</p><p>Asst. Prof.</p><p>CDCSIT, Tribhuvan University</p><p>Kritipur, Nepal</p><p></p>|||

# **SUPERVISOR’S RECOMMENDATION**

I hereby recommend that this project prepared under our supervision **Prashant Sharma Dhungana, Rabi Neupane and Sumit Dulal** entitled "**Steggy**" in partial** fulfillment of the requirements for the degree of Bachelor of Science in Computer Science and Information Technology to be processed for the evaluation.




……………………………..

Mr. Rom kant Pandey

Supervisor

















# **ACKNOWLEDGEMENT**

The success of this project would not have been possible without the kind support and assistance of many individuals and organizations, and we are immensely blessed to have got this all along the duration of our project. We would like to thank **Tribhuvan University** and **Texas International College** for providing us an opportunity. 

We would like to express our gratitude to our project supervisor **Mr. Rom kant Pandey** who took keep interest on our project and guided us throughout the project by providing all the necessary ideas, information, and knowledge for the developing a functional mobile application.

We are also appreciative of the efforts of B.Sc. CSIT coordinator **Mr. Kumar Poudyal**, without his supporting role, the project would have been nowhere near completion. Our special thanks to **Mr. Rom kant Pandey** and **Mr**. **Omkar Basnet** for their encouragement and guidance towards making this report standard as per the norms and values. 

We are thankful and fortunate enough to get constant support from our seniors and every teaching staff of B.Sc. CSIT department which helped us successfully complete our project. We would also like to extend our regards to all the non-teaching staff of B.Sc. CSIT department for their timely support.

Last but not the least, our thanks and appreciations also go to each one of our parents and colleagues for their encouragement and support in developing the project.










# **ABSTRACT**

In the age of the Internet where everything is virtual, security and privacy are issues that come up repeatedly, Steganography is one of the methods that aims to solve this problem. Image Steganography is the practice of hiding private or sensitive information within the image that appears to be nothing out to the usual. 

The main aim of the project is to solve fingerprinting issues by hiding text inside the image, referred as Image Steganography. Steganography includes the encryption and decryption process, where the secret text or message to be transmitted is hidden inside the cover image and encrypted output is called stego image. Then the stego image can be decrypted to obtain the secret message text or message. 

LSB (Least Significant Bit) algorithm is used to build the system where encryption is done with the help of AES Encryption and MAC. Different algorithms such as PSNR (Peak Scale to Noise Ratio), MSE (Mean Square Error) and Base64 are used to enhance the overall functioning and features of the system. 

Further, the system was implemented using several tools and technologies such as PHP for back-end development and HTML, CSS, and JS for user interface. The system has additional features such as User Gallery, Favorites, Histogram (before and after encryption) and API.



The system primarily focuses to deal with copyright and fingerprinting issues which have been a major problem in modern IT world. 








# **TABLE OF CONTENTS**
[LETTER OF APPROVAL	i****](#_Toc100316925)

[**SUPERVISOR’S RECOMMENDATION	ii****](#_Toc100316926)

[**ACKNOWLEDGEMENT	iii****](#_Toc100316927)

[**ABSTRACT	iv****](#_Toc100316928)

[**LIST OF ABBREVIATIONS	vii****](#_Toc100316929)

[**LIST OF FIGURES	viii****](#_Toc100316930)

[**LIST OF TABLES	ix****](#_Toc100316931)

[**1.INTRODUCTION	1****](#_Toc100316932)

[1.1	Overview	1](#_Toc100316933)

[1.2	Problem Statement	2](#_Toc100316934)

[1.3	Objectives	2](#_Toc100316935)

[1.4	Scope and Limitation	2](#_Toc100316936)

[1.5	Development Methodology	3](#_Toc100316937)

[1.6	Report Organization	4](#_Toc100316938)

[**2.BACKGROUND STUDY AND LITERATURE REVIEW	6****](#_Toc100316939)

[2.1	Background Study	6](#_Toc100316940)

[2.2	Literature Review	7](#_Toc100316941)

[**3.SYSTEM ANALYSIS	8****](#_Toc100316942)

[**3.1	System Analysis	8****](#_Toc100316943)

[**3.1.1	Requirement Analysis	8****](#_Toc100316944)

[**3.1.2	Feasibility Analysis	10****](#_Toc100316945)

[**3.1.3	Analysis	13****](#_Toc100316946)

[**4.SYSTEM DESIGN	16****](#_Toc100316947)

[4.1	Design	16](#_Toc100316948)

[4.1.1	Class Diagram	16](#_Toc100316949)

[4.1.2	State Diagram	17](#_Toc100316950)

[4.1.3	Sequence Diagram	18](#_Toc100316951)

[4.1.4	Activity Diagram	19](#_Toc100316952)

[4.1.5	Component Diagram	20](#_Toc100316953)

[4.1.6	Deployment Diagram	21](#_Toc100316954)

[4.2	Algorithm Details	22](#_Toc100316955)

[4.2.1	LSB Algorithm	22](#_Toc100316956)

[4.2.2	PSNR and MSE	23](#_Toc100316957)

[4.2.3	AES Encryption	24](#_Toc100316958)

[4.2.4	Message Authentication Code (MAC)	25](#_Toc100316959)

[4.2.5	Base64 Algorithm	26](#_Toc100316960)

[**5.IMPLEMENTATION AND TESTING	28****](#_Toc100316961)

[5.1	Implementation	28](#_Toc100316962)

[5.1.1	Tools Used	28](#_Toc100316963)

[5.1.2	Implementation Details of Modules	29](#_Toc100316964)

[5.2	Testing	33](#_Toc100316965)

[5.2.1	Test Cases for Unit Testing	33](#_Toc100316966)

[5.2.2	Test Cases for System Testing	43](#_Toc100316967)

[5.3	Result Analysis	44](#_Toc100316968)

[**6.CONCLUSION AND FUTURE RECOMMENDATION	45****](#_Toc100316969)

[6.1	Conclusion	45](#_Toc100316970)

[6.2	Future Recommendation	45](#_Toc100316971)

[**REFERENCES	46****](#_Toc100316972)

[**APPENDIX	47****](#_Toc100316973)


# **LIST OF ABBREVIATIONS**

|||
| :- | :- |
|**HTML**|Hyper Text Markup Language|
|**CSS**|Cascading Style Sheet|
|**UI**|User Interface|
|**UML**|Unified Modeling Language|
|**PHP**|Hypertext Pre-Processor|
|**JS**|JavaScript|
|**SQL**|Structured Query Language|
|**SDLC**|Software Development Lifecycle|
|**RGB**|Red, Green Blue Color Format|
|**VSCode**|Visual Studio Code|
|**LSB**|Least Significant Bit |
|**MAC**|Message Authentication Code|
|||
|||
|||








# **LIST OF FIGURES**

[Figure 1: SDLC Process using Agile XP Methodology	3](#_Toc100316974)

[Figure 2: Use Case Diagram for Image Steganography	9](#_Toc100316975)

[Figure 3: Use Case Diagram for API	9](#_Toc100316976)

[Figure 4: Gantt Chart for Time Schedule	12](#_Toc100316977)

[Figure 5: Object Modeling Using Class Diagram	13](#_Toc100316978)

[Figure 6: Dynamic Modeling using Sequence Diagram	14](#_Toc100316979)

[Figure 7: Process modelling using Activity Diagram	15](#_Toc100316980)

[Figure 8: Class Diagram for Image Steganography	16](#_Toc100316981)

[Figure 9: State Diagram for Image Steganography	17](#_Toc100316982)

[Figure 10: Sequence Diagram for Image Steganography	18](#_Toc100316983)

[Figure 11: Activity Diagram for Image Steganography	19](#_Toc100316984)

[Figure 12: Component Diagram for Image Steganography	20](#_Toc100316985)

[Figure 13: Deployment diagram for Image Steganography	21](#_Toc100316986)

[Figure 14: Block Diagram of AES	25](#_Toc100316987)

[Figure 15: Block Diagram of MAC	26](#_Toc100316988)

[Figure 16: Base64 Algorithm	27](#_Toc100316989)





# **LIST OF TABLES**

[Table 1: Test Case for User Registration	33](#_Toc100316990)

[Table 2: Test Case for User Login	34](#_Toc100316991)

[Table 3: Test Case for Encoding and Decoding	35](#_Toc100316992)

[Table 4: Test Case for creating and maintaining roles	39](#_Toc100316993)

[Table 5: Test Case for API	39](#_Toc100316994)

[Table 6: Test Case for Entire System	43](#_Toc100316995)


59

1. # **INTRODUCTION**

1. ## **Overview**

Steganography is a technique of hiding information in digital media. In contrast to cryptography, it is not to keep others from knowing the hidden information, but it is to keep others from thinking that the information even exists.

Steganography become more important as more people join the cyberspace revolution. Steganography is the art of concealing information in ways that prevents the detection of hidden messages. Steganography includes an array of secret communication methods that hide the message from being seen or discovered.

Due to advances in ICT, most of information is kept electronically. Consequently, the security of information has become a fundamental issue. Besides cryptography, steganography can be employed to secure information. In cryptography, the message or encrypted message is embedded in a digital host before passing it through the network, thus the existence of the message is unknown. Besides hiding data for confidentiality, this approach of information hiding can be extended to copyright protection for digital media: audio, video, and images.

If the information is hidden in an image, then it is called Image steganography.

Information hiding is an emerging research area, which encompasses applications such as copyright protection for digital media, watermarking, fingerprinting, and steganography. In watermarking applications, the message contains information such as owner identification and a digital time stamp, which usually applied for copyright protection. Fingerprint, the owner of the data set embeds a serial number that uniquely identifies the user of the data set. This adds to copyright information to makes it possible to trace any unauthorized use of the data set back to the user.

Steganography hides the secret message within the host data set and presence imperceptible and is to be reliably communicated to a receiver. The host data set is purposely corrupted, but in a covert way, designed to be invisible to an information analysis.




1. ## **Problem Statement**

No projects or applications are 100% productive, to overcome the flaw in existing application new projects and innovations are carried out. Following are the problems that creators are facing while creating contents:

- Difficulty in sending secret message.
- Difficulty in protecting own’s intellectual property.



1. ## **Objectives**

In the case for developing Image Stenography, following are the objective that this project aims to achieve:

- To hide presence of the message inside the image. 
- To encrypt the messages before embedding it into the image.
- To preserve copyright by using fingerprinting.


1. ## **Scope and Limitation**

The scope of the project is to limit unauthorized access and provide better security. To meet the requirements, we’ve used a simple and easy approach of Steganography along with the concept of encryption-decryption. The project finds suitable algorithms for encrypting the data and embedding it into an image, and later dig out the information and decrypt it into the original text. Our project aims at preserving intellectual property (image) by saving the users’ information inside the image and if the intellectual property gets stolen or misused then we can easily find out the source of the image. 

Some of the limitations of Image Steganography are:

- Huge number of data, huge file size, so someone can suspect about it.
- If the image is compressed multiple times, then there is possibility of data loss.
  1. ## **Development Methodology**

Among many methodologies available for the successful conduct of this project, we choose Agile XP Methodology. Extreme Programming is an [agile development methodology](https://www.digite.com/agile/agile-methodology/) used in the development of Software based on an iterative and incremental processes.

The system has implemented XP to develop the overall system since cryptography is implemented and with the help of XP, it became easier to release the system and update/enhance in batch. 

Extreme Programming (XP) is an agile software development framework that aims to produce higher quality software, and higher quality of life for the development team. XP is the most specific of the agile frameworks regarding appropriate engineering practices for software development. XP is based on the frequent iteration through which the developers implement User Stories. User stories are simple and informal statements of the customer about the functionalities needed.






**Figure 1: SDLC Process using Agile XP Methodology**

1. ## **Report Organization**

The project is organized in following manner:

**Chapter 1: Introduction**

The first chapter describes the project briefly with its problem statement, objectives, scope and limitation and development methodology.

**Chapter 2: Background Study and Literature Review**

The second chapter studies about the fundamental theories, concepts and terms related to the project. Research on different similar projects is done by other researcher in the Literature Review part.

**Chapter 3: System Analysis**

In the analysis chapter, study about different types of feasibility of the project along with its functional and non- functional requirements are conducted. 

**Chapter 4: System Design**

In this chapter, the system is designed with the help of analysis done in chapter 3. System modeling is done and different diagram which fall under UML such as class, state, activity, sequence diagram is figured out. The detail of the algorithm is also implemented in this chapter. 

**Chapter 5: Implementation and Testing**

This chapter includes all the tools and technology used for the development of the project, implementation, and testing. Implementation describes the system at a finer level of detail, down to the code level. Testing provides the techniques that is used to remove the bugs from the project.



**Chapter 6: Conclusion and Future Recommendation**

The final chapter includes conclusion of the overall project and the further work that can be done for enhancement of the project or to make the project more feasible.





1. # **BACKGROUND STUDY AND LITERATURE REVIEW**

1. ## **Background Study**

The word steganography comes from the Greek “Steganos”, which mean covered or secret and – “graphy” mean writing or drawing. Therefore, steganography means, literally, covered writing. It is the art and science of hiding information such its presence cannot be detected, and a communication is happening. A secret information is encoded in a manner such that the very existence of the information is concealed. Paired with existing communication methods, steganography can be used to carry out hidden exchanges.

The main goal of this projects it to communicate securely in a completely undetectable manner and to avoid drawing suspicion to the transmission of a hider data. There has been a rapid growth of interest in steganography for two reasons:

The publishing and broadcasting industries have become interested in techniques for hiding encrypted copyright marks and serial numbers in digital films, audio recordings, books, and multimedia products.

Moves by various governments to restrict the availability of encryption services have motivated people to study methods by which private messages can be embedded in seemingly innocuous cover messages.


1. ## **Literature Review**

There have been various approaches towards image steganography and some of the methods are described below:

T. Morkel et.al [1] have presented an overview of image steganography, its uses, and techniques for hiding the secret text in an image. The requirements of a good steganography algorithm have been discussed.

Pramod Choudhary et.al [2] proposed LSB based method for hiding the key image. Text is embedded within the cover image by rotating the image. Different angular rotations are often applied for hiding the text without losing the duvet image characteristics. The proposed algorithm is straightforward and efficient to make sure the knowledge hiding and may be used for various purposes including, storing patients’ history using his image as cover image, storing significant information about objects in objects image in cloud-based environment.

Ali Ahmed et.al [3] developed an improvement model for securing and hiding text messages into grey scale images. Two-stage processes for encrypted text messages using double XOR binary based operation were performed. Hiding encrypted text was made on LSB of each image pixel byte.

However, to overcome different problems in above research and approaches i.e., confidentiality issues, our system “Steggy” provides AES encryption from backend which will help in secure transmission of sensitive data.


1. # **SYSTEM ANALYSIS**

1. ## **System Analysis**

1. ### **Requirement Analysis**

Requirement analysis can be divided into two types:

1. Functional requirements: 

Functional requirements define what the system does or must do. The functional requirement contains the following:

**Sign-in:**

`		 `A new user must be able to sign in using email, password, and password image. 

`	`**Login:** 

`		`The user should be able to login using the given email and pass image.

`	`**Forgot Password:**  

`		`The user must be able to reset password if he/she forgets one.

`	`**Change Password:**  

`		`The user should be able to change his/her existing password.

`	`**Log-out:**  

`		`The user should be able to log out from the system. 

`	`**Encrypt image using plain text:**  

`		`The user should be able to encrypt the desired image using plain text.

`	`**Gallery:** 

`		`The users shall be able to upload their encrypted images to view publicly. 

`	`**Favorites:** 

`		`The users shall be able to save their favorite gallery image.  




**Figure 2: Use Case Diagram for Image Steganography**


**Figure 3: Use Case Diagram for API**

1. Non-functional requirements:

Non-functional requirements specify how the system should do it. The non-functional requirement contains the following:

**Perceptual transparency:** 

The text inside the image should be hidden while the image should not have any visible changes.  

**Security:** 

The system should be secure since sensitive information should be passed through the system. 

**Reliability:**

The system should be reliable and be able to decrypt the encoded message whenever required. 

**Robustness:** 

The designed system should have the ability to cop up with errors which may come during execution. 


1. ### **Feasibility Analysis**

- Technical Feasibility

The proposed project would use a pre-built framework, upgrade the existing system and the project would be platform independent. And following all the standard guidelines for projects, we do not expect there to be any technical problem for the proposed project.

The tools and technologies used in our project are: -

- HTML
- CSS
- JavaScript
- PHP
- Bootstrap
- Diagram drawing tools such as draw.io, creately. 



- Operational Feasibility

All the technologies that are to be used on the project are already being used for other applications, so there would not be any issues with operating the application.

The proposed application would be using the most common libraries and frameworks for development. So, the project would be expected to operate smoothly, and no user would face any problems using the system we have created.



- Economic Feasibility

The proposed project would be economically feasible, as we can easily use the open-source technologies available on the internet. Since the project doesn’t require additional learning material, it will cut down the cost issue. The registration process for the users will also be free and hence the user will be able to encrypt/decrypt image. 

We’ve calculated ROI (Return of Investment) of our project ‘Steggy’ which is shown as:



`	`System analysis and requirement cost = 5,000

`	`UI Design = 10,000

`	`Marketing cost per month = 5000

`	`Marketing cost per year = 60,000

`	`Domain hosting and DB charge = 31,000

Development cost = 50,000

Total investment per year = 5,000+10,000+60,000+31,000+50,000

`			        `= Rs. 1,28,100  



We’ve decided to sell this idea to a meme generator site ‘Kabbadi.com’ and we’ve estimated, for every meme generated, we will embed the personal details of the creator inside the meme, and it would cost around Rs. 3 per meme.

Minimum expected users from the platform per day = 100 

Income generated from meme generator in a year = 100 \* 3 \* 30 \* 12 

`						          `= Rs. 1,08,000

For calculating ROI, 

|Year|Income|
| - | - |
|0|-1,28,100|
|1|1,08,000|
|2|1,08,000|

Net profit = (1,08,000 \* 2) – 1,28,100

`	      `= Rs. 87,900

Average Annual Profit = Net profit / 2

`			   `= Rs. 43,950

ROI = (Avg. annual profit / investment) \* 100%

`       `= (43,950 / 1,28,100) \* 100%

`       `= 34.31%

Payback period = 2 years. 

Hence, the Return of Investment (ROI) of our project will be 34.31 %. 





- Time Schedule Feasibility

Image Steganography project was initiated at mid of August and is expected to complete in mid-January. The Gantt chart generated from the data is given below: 




**Figure 4: Gantt Chart for Time Schedule**
1. ### **Analysis**

- **Object Modeling using Class Diagram**

Object Modeling is a method for analysis, design, and implementation by an object-oriented technique. The object modeling of our system is done through class and object diagrams.



**Figure 5: Object Modeling Using Class Diagram**



- **Dynamic Modeling Using Sequence Diagrams**

Dynamic Modeling is used to specify and implement the control aspect of the system and is concerned with the temporal changes in the states of the objects in a system. The dynamic modeling of our application is done through state and sequence diagrams.



**Figure 6: Dynamic Modeling using Sequence Diagram**



- **Process Modeling using Activity Diagram**

The process modeling of our application is done through an activity diagram. The activity diagram is made to understand the flow of activities that is mainly done by the users.


**Figure 7: Process modelling using Activity Diagram**
1. # **SYSTEM DESIGN**

1. ## **Design**

1. ### **Class Diagram**

Class diagram is a static structure diagram which describe the system structure by showing class name, attributes, and operations. Class diagram is set of relation between classes in Unified Modelling Language (UML). Class diagram is useful for the business analysis and for developers too.



**Figure 8: Class Diagram for Image Steganography**

1. ### **State Diagram**

The figure below depicts the state diagram of the system and how each component in the system will behave.

The encryption state takes the text message from the user, encrypts it, and embeds it into an image selected by the user. Here the user gets an encrypted stego image. Similarly, the decryption state takes an encrypted stego image from the user where cipher text is extracted from the image. The extracted cipher text is then decrypted as original plain text.



**Figure 9: State Diagram for Image Steganography**
1. ### **Sequence Diagram**

A sequence diagram shows objects interactions arranged in time sequence. It depicts the objects and classes involved in the scenario and the sequence of messages exchanged between the objects needed to carry out the functionality of the scenario.

The sequence of different objects and their interaction are shown in the sequence diagram below:



**Figure 10: Sequence Diagram for Image Steganography**


1. ### **Activity Diagram**

The activity diagram below shows the working of the activities of the system. Two activity options are available to choose from. Encrypt option encrypts the message using a password/key. Then the user will have to load image to embed that encrypted message inside it. Finally, an encrypted stego image is created. 

In decryption activity, the user loads the encrypted stego image to extract the information that has been encrypted. The information is then decrypted into original message using the passphrase that was used for encryption. Here the encrypted message is retrieved.



**Figure 11: Activity Diagram for Image Steganography**
1. ### **Component Diagram**

In a UML diagram, a component diagram represents how the components are wired together to form larger components or software systems.  They make large systems easily representable and make them convenient to understand.

It breaks down the actual system into various high levels of functionality. Each component is responsible for a particular task and interacts with other components on a need-to-know basis.

In this system, there are a total of 5 components that interact with the main system. The PHP Environment provides an environment for the source code to run, the Image destination and access folder are where the destination stego image is stored and input images are stored respectively, the AES library provides the functions for the encryption process to run, and finally, the UI component is from where the user views the system. All these components are connected to the main Steganography system. 



**Figure 12: Component Diagram for Image Steganography**

1. ### **Deployment Diagram**

A deployment diagram is a UML diagram type that shows the execution architecture of a system, including nodes such as hardware or software execution environments, and the middleware connecting them. The main entities in our project are steganography algorithm which is followed by encryption. At last, the stego image is decrypted and original message can be shown. The deployment diagram of Image Steganography is shown below.



**Figure 13: Deployment diagram for Image Steganography**




1. ## **Algorithm Details**

1. ### **LSB Algorithm**

Firstly, each character of secret message and each pixel of cover image are converted into binary values. The user must input stego-key as the password (stego-key is used to embed the secret message in a cover file). After inserting secret message into cover image file, the resulting stego-image is sent to the receiver through the desired communication channel. While defining the starting point of embedding LSB, the stego-key is firstly collected from the user. 

We have used the blue channel to encode our secret text. Every single bit of our text is kept inside the last bit of the blue channel (LSB). We implemented steganography only in blue channel to minimize attack vectors of attacker who want to extract the secret message from the image. 

The summation of the ASCII value of each character of stego key is calculated and then the average of those characters value is computed. While substituting the secret message into LSB of cover image, the first LSB position is chosen according to the calculated average value of input stego-key characters. Then the substitution processing will continue until the end of secret message.

1. **The embedding algorithm at the sender side**

1. Get the input cover image and secret message. 
1. Accept the stego-key from the user and calculate average value of them. 
1. Convert each character of secret message and each LSB bit of cover image (B channel) from the position of average of stego-key. 
1. Substitute the LSB bit of cover image (B channel) with binary values of secret message with respect to the starting point until the end of secret message. 
1. Insert the end character value at the end of secret message. 
1. Send a stego-image to the receiver. 
1. **The extracting algorithm at the receiver side** 

1. Get the input stego calculate average value 
1. Load the stego-image that is sent from the sender. 
1. Extract each of LSB bit from the stego image until to find out the end bit. 
1. Reconstruct the collecting LSB bits from the stego-image. 
1. Transform the LSB bits to correspondent characters.


1. ### **PSNR and MSE**

The PSNR block computes the peak signal-to-noise ratio, in decibels, between two images. This ratio is used as a quality measurement between the original and a compressed image. The higher the PSNR, the better the quality of the encoded, or reconstructed image.

The mean-square error (MSE) and the peak signal-to-noise ratio (PSNR) are used to compare image encoding quality. The MSE represents the cumulative squared error between the encoded and the original image, whereas PSNR represents a measure of the peak error. The lower the value of MSE, the lower the error.

To compute the PSNR, the block first calculates the mean-squared error using the following equation:

PSNR = 10log10(R2MSE)

In the previous equation, R is the maximum fluctuation in the input image data type. For example, if the input image has a double-precision floating-point data type, then R is 1. If it has an 8-bit unsigned integer data type, R is 255, etc.

**Implementation in Steggy:** 

In our project, MSE is calculated to check the difference between image before and after encoding. Our algorithm tries to reduce MSE (close to 0). 

PSNR is used to find the ratio between the maximum possible power of the image signal and the power of corrupted (changed) bits. 


1. ### **AES Encryption** 

Advanced Encryption Standard (AES) Algorithm is a replacement of DES (Data Encryption Standard) Algorithm. It is a popular and widely populated symmetric key 12 encryption algorithm (uses the same key for both encryption and decryption). 

Encryption is done using OpenSSL and the AES-256-CBC cipher using the encryptString method provided by the Crypt façade in Laravel.

**Operation of AES**

AES is an iterative rather than Feistel cipher. It is based on ‘substitution–permutation network’. It comprises of a series of linked operations, some of which involve replacing inputs by specific outputs (substitutions) and others involve shuffling bits around (permutations).

Interestingly, AES performs all its computations on bytes rather than bits. Hence, AES treats the 128 bits of a plaintext block as 16 bytes. These 16 bytes are arranged in four columns and four rows for processing as a matrix.



**Figure 14: Block Diagram of AES**


1. ### **Message Authentication Code (MAC)**

Message Authentication Code (MAC), also referred to as a tag, is used to authenticate the origin and nature of a message. MACs use authentication cryptography to verify the legitimacy of data sent through a network or transferred from one person to another. 

The first step in the MAC process is the establishment of a secure channel between the receiver and the sender. To encrypt a message, the MAC system uses an algorithm, which uses a symmetric key and the plain text message being sent. The MAC algorithm then generates authentication tags of a fixed length by processing the message. The resulting computation is the message’s MAC. This MAC is then appended to the message and transmitted to the receiver. The receiver computes the MAC using the same algorithm. If the resulting MAC the receiver arrives at equals the one sent by the sender, the message is verified as authentic, legitimate, and not tampered with.

Steggy uses MAC to check the authenticity of encrypted message if it has been tampered or not. This ensures the integrity of the encrypted message. 



**Figure 15: Block Diagram of MAC**



1. ### **Base64 Algorithm**

Base64 encoding is used to convert binary data not a text-like format that allows it to be transported in environments that can handle only text safely. Use cases are encoding UID’s for use in HTTP URL’s, encoding encryption keys and certificates to make them safely portable through e0mail, display them in HTML pages and use them with copy and paste. 

Base64 is sometimes also referred to as PEM, which stands for Privacy-enhanced Electronic Mail. There, Base64 was used to create printable text again after binary e-mail data that was generate d during the e-mail encryption process.

**Implementation in Steggy:**

In our system, the user receives image in the form of Base64. Then the user uses Base64 during transfer of image from client to server. Base64 encoding is done for both encode and decode process.


**Figure 16: Base64 Algorithm**

The first step is to take the three bytes (24bit) of binary data and split it into four numbers of six bits. Because the ASCII standard defines the use of seven bits, Base64 only uses 6 bits (corresponding to 2^6 = 64 characters) to ensure the encoded data is printable and none of the special characters available in ASCII are used. The algorithm’s name Base64 comes from the use of these 64 ASCII characters. The ASCII characters used for Base64 are the numbers 0-9, the alphabets 26 lowercase and 26 uppercase characters plus two extra characters ‘+’ and ‘/’.









1. # **IMPLEMENTATION AND TESTING**

1. ## **Implementation**

1. ### **Tools Used**

**Case Tools: -** 

- Project management tools: Git & GitHub
- Diagram drawing tools: draw.io, creately

**Programming Languages: -** 

- PHP/ Laravel: 

The system uses PHP as a main backend programming language for the implementation of algorithm and to build the overall system. 

- HTML, CSS, and Bootstrap: 

As a part of front-end development, the user interface is designed using HTML, CSS, and Bootstrap feature for a clean and responsive UI system. 

- JavaScript:

The system integrated JavaScript and its libraries to make the system functional, dynamic and user friendly. 

**Database Platform: -** 

- MySQL:

The system uses MySQL database since it is the most popular database system used with PHP.

1. ### **Implementation Details of Modules**  

**EncodeDecodeTrait:**

This trait is responsible for encoding and decoding of the images. It is used in different controllers for reusability.

**Methods:**

- **steganize ($file, $message, $skip=false): array**

This method is used for encoding the secret message or text inside the image. 

**Parameters:**

`	`$file – Image to be encoded

`	`$message – Text to be encoded inside the image 

`	`$skip (Default=false) – skips the histogram calculation

- **desteganize ($file): string** 

This method is used for decoding the secret message from the encoded image. 

`	`**Parameters:** 

`		`$file – Image to be decoded


**RegisteredUserController uses EncodeDecodeTrait:** 

This controller is responsible for registering new users in the system by using their input password and input image. 


`	`**Methods:**

- **create(): view**

`			`This method returns view(form) for user registration.

- **Store(Request $request): response**

This method stores the user information inputted from user registration form. 

`	`**Parameters:**

`		`**Request $request:**

`			`Dependency injection for the registered request from user. 


**AuthenticatedSessionController uses EncodeDecodeTrait:** 

This class is responsible for login of registered users.

`	`**Methods:**

- **create(): view**

`			`This method returns view(form) for user login.

- **Store(LoginRequest $request): response**

This method validates the registered users by taking pass image as input and if successful, it creates a new session. 

`	`**Parameters:**

`		`**LoginRequest $request**





**UserController:**

This class is responsible for handling the users’ view and users’ information modification.

`	`**Methods:**

- **index(): response**

`			`This method returns the view for current logged in user information.

- **Update(Request $request, $id): response**

This method is responsible for updating the users’ information except the password.

`	`**Parameters:**

`		`**Request $request** 

`		`**$id:**

`			`Id of the current logged in user. 

`		`**updatePassword (Request $request):** 

`			`This method updates the pass image of the user.


**GalleryController uses EncodeDecodeTrait:**

This controller is used to display the gallery images and encode/decode functionality. 

`	`**Methods:**

- **index():view**

`			`This method returns the view for images posted publicly. 

- **encode(Request $request): response**

`			`This method encodes text message into the image.

- **decode(Request $request): response**

`			`This method decodes the text message from the encoded image. 

**FavouriteController:**

This controller lets the user save their favourite images from the gallery. 

`	`**Methods:**

- **index(): view**

`			`This method returns view for the favourite images saved by the users. 

- **Store(Request $request)**

`			`This method stores the favourite images. 


**DashboardController**

This controller lets the admin view and edit the users’ information.

`	`**Methods:**

- **index(): view**

`			`This method returns the view for the admin dashboard. 



**UploadController uses EncodeDecodeTrait:**

This controller is responsible for all the API requests done within steggy system.



`	`**Methods:**

- **encode(EncodeRequest $request):** 

`			`This method encodes secret message into Base64 image.

- **decode(DecodeRequest $request):**

This method decodes the Base64 image by using the given 16-digit passphrase.	
1. ## **Testing** 

Software testing is a process, to evaluate the functionality of a software application with an intent to find whether the developed software met the specified requirements or not and to identify the defects to ensure that the product is defect-free to produce a quality product. The Steggy project is also tested using many test cases for unit testing and system testing as follows.


1. ### **Test Cases for Unit Testing** 

**Table 1: Test Case for User Registration**


|Test case ID|Test Description|Test steps|Input test data|Expected result|Actual Result|Pass/Fail|
| - | - | - | - | - | - | - |
|T-01|Signup with empty data|<p>1. Click on register button</p><p><br>2.Leave input fields empty</p><p></p><p>3.Again click on register button</p>|<p>Name:</p><p>Email:</p><p>Pass Image:</p><p></p>|Error messages for all fields will be shown with an error summary.|Error messages for all fields was shown with an error summary|Pass|
|T-02|Signup with valid data|<p>1. Click on register button</p><p><br>2.Enter valid data for all fields</p><p></p><p>3.Click on register button</p>|<p>Name: Rabi Neupane</p><p>Email:rabi12@gmail.com</p><p>Pass Image: image 201212.png</p><p></p>|New user will be created successfully and email verification message will be shown  .|New user was created successfully and email verification message was shown  .|<p>Pass</p><p><br><br><br><br><br><br><br></p>|
|T-03|Signup with invalid data|<p>1. Click on register button</p><p><br>2.Enter invalid data for any field or all fields</p><p></p><p>3.Click on register button</p>|<p>Name:11</p><p>Email: rraaa</p><p>Pass Image: image 201212.png</p><p></p><p></p>|Error messages for all fields will be shown with an error summary.|Error messages for all fields were shown with an error summary.|Pass|



**Table 2: Test Case for User Login**


|Test case ID|Test Description|Test steps|Input test data|Expected result|Actual Result|Pass/Fail|
| - | - | - | - | - | - | - |
|T-11|Login with valid data|<p>1.Enter the valid email and password</p><p></p><p>2.Click on login button</p>|<p>Email: rabi12@gmail.com PassImage: image 201212.png</p><p></p><p></p>|The login page should redirect to homepage |The login page was redirected to homepage |Pass|
|T-12|<p>Login with </p><p>Invalid details</p>|<p>1.Enter incorrect email or password or both. </p><p></p><p>2.Click on login button</p>|<p>Email:rabi1@gmail.com PassImage: image 20121.png</p><p></p><p></p>|The login page should not redirect to homepage with login error message |The login page was not redirected to homepage with login error message |Pass|
|T-13|Login empty fields|<p>1.Leave the entry fields empty</p><p></p><p>2.Click on login button</p>|Email:<br>PassImage:|The login page should not redirect to homepage with login error message |The login page was not redirected to homepage with login error message |Pass|




**Table 3: Test Case for Encoding and Decoding**
**



|Test case ID|Test Description|Test steps|Input test data|Expected result|Actual Result|Pass/Fail|
| - | - | - | - | - | - | - |
|T-21|Encoding with Empty data|<p>1. Login with registered and verified account</p><p><br>2. Click on Encode button</p><p></p><p>3.Leave the entry fields empty</p><p></p><p>4. Click On Save Changes button</p>|<p>Text to be Encoded:</p><p>“”</p><p></p><p>If post publicly selected then</p><p></p><p>Small message appears:</p><p></p><p>Or</p><p>Post privately:</p><p></p>|Error message should be shown|Error message was shown|Pass|
|T-22|Encoding with png image |<p>1. Login with registered and verified account</p><p><br>2. Click on Encode button</p><p></p><p>3.Fill all the fields and select png extension image</p><p></p><p>4. Click On Save Changes button</p><p></p>|<p>Text to be Encoded: hi</p><p></p><p>Post publicly selected</p><p></p><p></p><p>Drop file here or Click to upload: image 1223.png </p><p></p><p></p>|Text should be encoded on the image|Text  was encoded successfully|Pass|
|T-23|Encoding with jpg/jpeg|<p>1. Login with registered and verified account</p><p><br>2. Click on Encode button</p><p></p><p>3.Fill all the fields and select jpg/jpeg extension image</p><p></p><p>4. Click On Save Changes button</p><p></p>|<p>Text to be Encoded: hello</p><p></p><p>Post publicly selected</p><p></p><p>Drop file here or Click to upload: image 1223.jpg </p><p></p><p></p>|Text should be encoded on the image|Text  was encoded successfully|Pass|
|T-24|Encoding with MP4/mkv|<p>1. Login with registered and verified account</p><p><br>2. Click on Encode button</p><p></p><p>3.Fill all the fields and select mp4/mkv extension video</p><p></p><p>4. Click On Save Changes button</p><p></p>|<p>Text to be Encoded: hello</p><p></p><p>Post publicly selected</p><p></p><p>Drop file here or Click to upload:movie1223.mkv</p><p></p><p></p>|Text should not be encoded|Text was not encoded|Pass|
|T-25|Decoding with Empty data|<p>1. Click on Decode button</p><p></p><p>2.Leave the entry fields empty</p><p></p><p>3. Click On Save Changes button</p>|Drop file here or Click to upload:|Text should not be decoded|Text was not decoded|Pass|
|T-26|Decoding using encoded image|<p>1. Click on Decode button</p><p></p><p>2.Select image from images folder</p><p></p><p>3. Click On Save Changes button</p>|<p>Drop file here or Click to upload: image 1223.jpg </p><p></p>|Text should be decoded|Text was decoded|Pass|
|T-27|Decoding using normal image|<p>1. Click on Decode button</p><p></p><p>2.Select image from images folder</p><p></p><p>3. Click On Save Changes button</p>|<p>Drop file here or Click to upload: image 1223112.jpg </p><p></p>|Text should not be shown|Text was not shown|Pass|




**Table 4: Test Case for creating and maintaining roles**


|Test case ID|Test Description|Test steps|Input test data|Expected result|Actual Result|Pass/Fail|
| - | - | - | - | - | - | - |
|T-31|Creating new roles by admin|<p>1.Login with the admin account.</p><p><br>2. Click on edit button in user table.</p><p></p><p>3.Change the role to admin.</p><p></p><p></p>||A new admin role will be created|A new admin role was created|Pass|




**Table 5: Test Case for API**

|Test case ID|Test Description|Test steps|Input test data|Expected result|Actual Result|Pass/Fail|
| - | - | - | - | - | - | - |
|T-41|Encoding using API with empty Keys|<p>1.Open postman and select POST and write down the URL for the encode API</p><p></p><p>2.Goto Authorization Tab and select Bearer Token and paste that access token </p><p></p><p>3.Goto Headers Section and then go to hidden headers uncheck the Accept Header and again Add Accept in Key and application/json in value.</p><p></p><p>4.Goto Body section and fill up the required keys and values note that in encode key we must put 64 bit value of the image.</p><p></p>|<p>Access token:</p><p>3|xhi6GyX1TYnC2hT4liG9HoN60KG5uoNlzt1o5ov6</p><p></p><p>POST Url For  Encode:</p><p>http://127.0.0.1:8000/api/encode</p><p></p><p>POST Url For Decode:</p><p>http://127.0.0.1:8000/api/decode</p><p></p><p></p><p>Encode keys:</p><p>encode: data:</p><p></p><p>encode\_text:</p><p></p><p>passphrase:</p><p></p>|Error messages for all fields will be shown with an error summary.|Error messages for all fields was shown with an error summary.|Pass|
|T-42|Encoding using API with valid Keys|Same as above with Keys|<p>Access token:</p><p>3|xhi6GyX1TYnC2hT4liG9HoN60KG5uoNlzt1o5ov6</p><p></p><p>POST Url For  Encode:</p><p>http://127.0.0.1:8000/api/encode</p><p></p><p>Encode keys:</p><p>encode: data:image/jpeg;base64,/9fyrdceuhn…</p><p></p><p>encode\_text:</p><p>hi</p><p></p><p>passphrase:</p><p>1111111111111111</p>|Text should be encoded on the image|Text  was encoded successfully|Pass|
|T-43|Decoding using API with empty Keys|<p>1.Open new tab in postman and select POST and write down the URL for the encode API</p><p></p><p>4.Goto Authorization Tab and select Bearer Token and paste that access token </p><p></p><p>5.Goto Headers Section and then go to hidden headers uncheck the Accept Header and again Add Accept in Key and application/json in value.</p><p></p><p>6.Goto Body section and fill up the required keys and values note that in decode key we must put 64 bit value of the image.</p><p></p>|<p>Access token:</p><p>3|xhi6GyX1TYnC2hT4liG9HoN60KG5uoNlzt1o5ov6</p><p>POST Url For Decode:</p><p>http://127.0.0.1:8000/api/decode</p><p></p><p>Decode keys:</p><p>decode: data:image/jpg;base64,iVBygfydrYG6byb…</p><p></p><p></p><p>passphrase:</p><p>1111111111111111</p>|Error messages for all fields will be shown with an error summary.|Error messages for all fields was shown with an error summary.|Pass|
|T-44|Decoding using API with valid Keys|Same as above with Keys.|<p>Access token:</p><p>3|xhi6GyX1TYnC2hT4liG9HoN60KG5uoNlzt1o5ov6</p><p></p><p></p><p>POST Url For Decode:</p><p>http://127.0.0.1:8000/api/decode</p><p></p><p>Decode keys:</p><p>decode: data:image/jpg;base64,iVBYBse4fr…</p><p></p><p></p><p>passphrase:</p><p>1111111111111111</p>|Text should be decoded|Text was decoded|Pass|























1. ### **Test Cases for System Testing**

In this testing phase, our system was tested. Every individual component was integrated and tested against user and hardware compatibility. 


**Table 6: Test Case for Entire System**


|Test case Id|Test Description|Test Steps|<p>Input Test</p><p>Data</p>|Expected Results|Actual Results|Result|
| - | - | - | - | - | - | - |
|T-51|Full Application|<p>1. Click on register button</p><p><br>2.Enter valid data for all fields</p><p></p><p>3.Click on register button</p><p>4.Enter the valid email and password</p><p></p><p>5.Click on login button</p><p>6. Click on Encode button</p><p></p><p>7.Fill all the fields and select jpg/jpeg extension image</p><p></p><p>8. Click On Save</p><p>9. Click on Decode button</p><p></p><p>10.Select image from images folder</p><p></p><p>11. Click On Save Changes button</p><p></p><p></p>|<p>Signup data:</p><p>Name: Rabi Neupane</p><p>Email:rabi12@gmail.com</p><p></p><p>Pass Image: image 201212.png</p><p></p><p>Login data:</p><p>Email: rabi12@gmail.com</p><p></p><p>PassImage: image 201212.png</p><p></p><p>Encode data:</p><p>Text to be Encoded: hi</p><p></p><p>Post publicly selected</p><p></p><p></p><p>Drop file here or Click to upload: image 1223.png </p><p></p><p></p><p></p><p></p>|<p>Sign up and Log into the system and the user should be able to encode and decode images, view gallery, save favorites, View histogram.</p><p></p>|<p>User account was created and the user is logged in to the system. User is able to encode and decode the images, view gallery, view histogram, save to favorites.</p><p></p>|Pass|
|T-52|Full Application|<p>1.Users should login using valid data </p><p></p><p>2.In home page admin can see the dashboard section in  dropdown menu.</p>||The Admin should be able to log in, manage admin roles, manage gallery.|<p>Admin was able to log in, manage admin roles, manage gallery.</p><p></p>|Pass|



1. ## **Result Analysis**

The steganography application was tested manually with different sets of data, and it performed as expected in most of the test cases. All functional requirements were also met during the testing procedure. Unit testing was done to check certain functions and areas of code. System Testing was done to verify that the product to be delivered meets the specifications in the requirement document. Each module of this system was tested to check the correctness of the output. The expected result was compared with the outcome that was obtained after assigning some values.


1. # **CONCLUSION AND FUTURE RECOMMENDATION**

1. ## **Conclusion**

“Steggy” as the name suggests is a Steganography system that encrypts messages and hides them inside images. The system can hide text messages inside of the image provided by the user. It uses the AES algorithm for the encryption of text and images, and the LSB algorithm for Steganography. The main objective of this system was to send sensitive information securely and preserve copyright issues within an image. 

We’ve used PHP as the backend programming language where the algorithm is implemented, and the system is designed in a user-friendly way and the results are displayed in the web page. This project is only a steppingstone towards a larger possibility of how image steganography or steganography process can be utilized for secure transmission of date or hiding the presence of sensitive information whenever required i.e., solving fingerprinting issues. 

1. ## **Future Recommendation**

Our project work is open for further enhancement, with the expectation that it becomes more robust and better enhanced. There are still a lot of areas that can be improved further regarding our system as follows:

- The users can sign up using email and password image only. They do not have to rely on text passwords as they will be automatically generated from backend. 
- Image chatting feature can be added between multiple users in the system. 
- The user can get notification if their image is being reacted or viewed by other users in the system. 
- Hiding the presence of text inside the video like Image Steganography can be added in future. 

# **REFERENCES**


|[1] |T. Morkel, J. Ellof and M. Olivier, “AN OVERVIEW OF IMAGE STEGANOGRAPHY,” *Proceedings of the Fifth Annual Information Security South Africa Conference (ISSA2005),* 2005. |
| :- | :- |
|[2] |P. Choudhary, T. S. Jaiswal and P. K. Gupta, “IMAGE STEGANOGRAPHY BASED ON LSB TECHNIQUE,” *International Research Journal of Modernization in Engineering Technology and Science,* vol. 02, no. 05, 2020. |
|[3] |A. Ahmed and A. Ahmed, “A Secure Image Steganography using LSB and Double XOR,” *IJCSNS International Journal of Computer Science and Network Security,* vol. 20, p. 139, May 2020. |
|[4] |“Advanced Encryption Standard,” [Online]. Available: https://www.tutorialspoint.com/cryptography/advanced\_encryption\_standard.htm.|
|[5] |<p>A. Aggarwal, A. Sangal and A. Varshney, “IMAGE STEGANOGRAPHY USING LSB ALGORITHM,” International Journal of Information Sciences and Application (IJISA), 2019.</p><p></p>|
|[6]|V. Gupta and A. Barve, “International Journal of Mechanical Engineering and Information Technology,” A review on Image Watermarking and its Techniques, vol. 2, no. 1, p. 8, 2014.|
|[7]|S. Gyawali, “Encryptstego,” Kathmandu, 2021.|





# **APPENDIX**
**Screenshots:**

1. Register page 

1. Login page

1. Gallery page

1. View Histogram, MSE and PSNR 

1. To encode the image

1. Decode the encoded image

1. User Profile page


1. User history page

1. Favorites Section


1. View Page to see image and message of user

1. Page to change the pass image

**Snippets of major source code components:**

**Steganize ()**






**desteganize()**










**UserController:**

**Gallerycontroller:**

**API controller:**















