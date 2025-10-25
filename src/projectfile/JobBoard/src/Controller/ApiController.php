<?php

namespace App\Controller;

use Exception;
use App\Entity\User;
use App\Entity\Company;
use App\Entity\Application;
use App\Entity\Advertisement;
use App\Repository\UserRepository;
use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ApplicationRepository;

use App\Repository\AdvertisementRepository;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;

final class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        // Redirect to home page
        return $this->redirectToRoute("app_home");
    }

    #[Route("/api/test", name:"app_api_test", methods: ["POST"])]
    public function testAPI(Request $request, JWTEncoderInterface $JWTEncoder): Response {

        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        return $this->json([
            'success' => true,
            'payload' => $payload,
        ]);
    }

    // Advertisement
    #[Route("/api/advertisement", name: "app_api_advertisements", methods: ["GET"])]
    public function getAdvertisements(AdvertisementRepository $advertisementRepository): Response
    {   
        $advertisements = $advertisementRepository->findAll();

        $result = array();

        foreach ($advertisements as $advertisement) {
            $company = $advertisement->getCompany();

            $companyData = array(
                "company_id" => $company->getId(),
                "company_name" => $company->getName(),
            );

            $result[] = array(
                "company" => $companyData,
                "advertisement_id" => $advertisement->getId(),
                "advertisement_title" => $advertisement->getTitle(),
                "advertisement_description" => $advertisement->getDescription(),
                "advertisement_salary" => $advertisement->getSalary(),
                "advertisement_workhours" => $advertisement->getWorkhours(),
            );
        }

        return $this->json($result);
    }

    #[Route("/api/advertisement/{id}", name: "app_api_advertisement", methods: ["GET"])]
    public function getAdvertisement(Advertisement $advertisement = null, AdvertisementRepository $advertisementRepository): Response
    {
        if (!$advertisement) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result);
        };

        $company = $advertisement->getCompany();

        $companyData = array(
            "company_id" => $company->getId(),
            "company_name" => $company->getName(),
        );

        $result = array(
            "success" => true,
            "company" => $companyData,
            "advertisement_id" => $advertisement->getId(),
            "advertisement_title" => $advertisement->getTitle(),
            "advertisement_description" => $advertisement->getDescription(),
            "advertisement_salary" => $advertisement->getSalary(),
            "advertisement_workhours" => $advertisement->getWorkhours(),
        );

        return $this->json($result);
    }

    #[Route("/api/advertisement/create", name: "app_api_advertisement_create", methods: ["POST"])]
    public function createAdvertisement(Request $request, AdvertisementRepository $advertisementRepository, EntityManagerInterface $entityManager, CompanyRepository $companyRepository, ValidatorInterface $validator, JWTEncoderInterface $JWTEncoder): Response
    {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if ($requestData == null) {
            $result = array(
                "success" => false,
                "error" => "invalid inputs",
            );
            
            return $this->json($result);
        }

        $company = null;
        
        if ($requestData["company_id"] != null) {
            $company = $companyRepository->find($requestData["company_id"]);
            
            if (!$company) {
                $result = array(
                    "success" => false,
                    "error" => "invalid company id",
                );
                
                return $this->json($result);
            }
        }
        
        $advertisement = new Advertisement();
        $advertisement->setCompany($company);
        $advertisement->setTitle($requestData["advertisement_title"]);
        $advertisement->setDescription($requestData["advertisement_description"]);
        $advertisement->setSalary($requestData["advertisement_salary"]);
        $advertisement->setWorkhours($requestData["advertisement_workhours"]);

        $errors = $validator->validate($advertisement);

        if (count($errors) > 0) {
            $result = array(
                "success" => false,
                "error" => "invalid inputs (validator)",
            );

            return $result;
        }    

        $entityManager->persist($advertisement);
        $entityManager->flush();
                    
        $result = array(
            "success" => true,
            "advertisement_id" => $advertisement->getId(),
        );
                    
        return $this->json($result);
    }

    #[Route("/api/advertisement/update", name: "app_api_advertisement_update", methods: ["PUT"])]
    public function updateAdvertisement(Request $request, AdvertisementRepository $advertisementRepository, EntityManagerInterface $entityManager, ValidatorInterface $validator, JWTEncoderInterface $JWTEncoder): Response {
        $requestData = json_decode($request->getContent(), true);
        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if ($requestData == null) {
            $result = array(
                "success" => false,
                "error" => "invalid inputs",
            );
            
            return $this->json($result);
        }

        $advertisement = $advertisementRepository->find($requestData["advertisement_id"]);

        if (!$advertisement) {
            $result = array(
                "success" => false,
                "error" => "invalid advertisement id",
            );
            
            return $this->json($result);
        }

        $advertisement->setTitle($requestData["advertisement_title"]);
        $advertisement->setDescription($requestData["advertisement_description"]);
        $advertisement->setSalary($requestData["advertisement_salary"]);
        $advertisement->setWorkhours($requestData["advertisement_workhours"]);

        $errors = $validator->validate($advertisement);

        if (count($errors) > 0) {
            $result = array(
                "success" => false,
                "error" => "invalid inputs (validator)",
            );

            return $result;
        }    

        $entityManager->flush($advertisement);
                    
        $result = array(
            "success" => true,
            "advertisement_id" => $advertisement->getId(),
        );
                    
        return $this->json($result);
    }

    #[Route("/api/advertisement/{id}/delete", name: "app_api_advertisement_delete", methods : ["DELETE"])]
    public function deleteAdvertisement(Advertisement $advertisement,AdvertisementRepository $advertisementRepository, EntityManagerInterface $entityManager, Request $request, JWTEncoderInterface $JWTEncoder): Response
    {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if (!$advertisement) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result);
        }

        $entityManager->remove($advertisement);
        $entityManager->flush();

        $result = array(
            "success" => true,
        );

        return $this->json($result);
    }

    // Application
    #[Route("/api/application", name: "app_api_applications")]
    public function getApplications(ApplicationRepository $applicationRepository): Response
    {   
        $applications = $applicationRepository->findAll();

        $result = array();

        foreach ($applications as $application) {
            $userId = null;

            if ($application->getUser() != null) {
                $userId = $application->getUser()->getId();
            };

            $result[] = array(
                "application_id" => $application->getId(),
                "user_id" => $userId,
                "advertisement_id"=>$application->getAdvertisement()->getId(),
                "application_message" => $application->getMessage(),
                "application_firstname" => $application->getFirstname(),
                "application_lastname" => $application->getLastname(),
                "application_email" => $application->getEmail(),
                "application_phone" => $application->getPhone(),
            );
        }

        return $this->json($result);
    }

    #[Route("/api/application/create", name: "app_api_application_create", methods: ["POST"])]
    public function createApplication(Request $request, ApplicationRepository $applicationRepository, AdvertisementRepository $advertisementRepository, EntityManagerInterface $entityManager, ValidatorInterface $validator, JWTEncoderInterface $JWTEncoder): Response {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if ($requestData == null) {
            $result = array(
                "success" => false,
                "error" => "invalid inputs",
            );
            
            return $this->json($result);
        }

        // Checking Advertisement
        if ($requestData["advertisement_id"] == null) {
            $result = array(
                "success" => false,
                "error" => "invalid advertisement id",
            );
            
            return $this->json($result);
        }

        $advertisement = $advertisementRepository->find($requestData["advertisement_id"]);

        if (!$advertisement) {
            $result = array(
                "success" => false,
                "error" => "invalid advertisement",
            );
            
            return $this->json($result);
        }

        // Checking User (if exists)
        if (!$this->getUser()) {
            $result = array(
                "success" => false,
                "error" => "User not connected",
            );
            
            return $this->json($result);
        }

        $application = new Application();
        $application->setAdvertisement($advertisement);
        // Sets user based on the current connected user
        $application->setUser($this->getUser());
        $application->setMessage($requestData["application_message"]);
        $application->setFirstname($requestData["application_firstname"]);
        $application->setLastname($requestData["application_lastname"]);
        $application->setEmail($requestData["application_email"]);
        $application->setPhone($requestData["application_phone"]);

        $errors = $validator->validate($application);

        if (count($errors) > 0) {
            $result = array(
                "success" => false,
                "error" => "invalid inputs (validator)",
            );

            return $result;
        }

        $entityManager->persist($application);
        $entityManager->flush();
                    
        $result = array(
            "success" => true,
            "application_id" => $application->getId(),
        );

        return $this->json($result);
    }


    #[Route("/api/application/{id}", name: "app_api_application", methods: ["GET"])]
    public function getApplicationById(Application $application = null, ApplicationRepository $applicationRepository): Response
    {
        if (!$application) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result);
        };

        $userId = null;

        if ($application->getUser() != null) {
            $userId = $application->getUser()->getId();
        };

        $result = array(
            "success" => true,
            "advertisement_id"=>$application->getAdvertisement()->getId(),
            "user_id" => $userId,
            "application_id" => $application->getId(),
            "application_message" => $application->getMessage(),
            "application_firstname" => $application->getFirstname(),
            "application_lastname" => $application->getLastname(),
            "application_email" => $application->getEmail(),
            "application_phone" => $application->getPhone(),
        );

        return $this->json($result);
    }

    #[Route("/api/myapplications", name: "app_api_myapplications", methods: ["GET"])]
    public function getMyApplications( ApplicationRepository $applicationRepository): Response
    {
        if (!$this->getUser()) {
            $result = array(
                "success" => false,
                "error" => "not connected",
                "applications" => []
            );

            return $this->json($result);
        };

        $applications = $this->getUser()->getApplications();

        $applicationsIds = [];

        foreach($applications as $application) {
            $applicationsIds[] = $application->getAdvertisement()->getId();
        }

        $result = array(
            "success" => true,
            "applications" => $applicationsIds,
        );

        return $this->json($result);
    }

    #[Route("/api/application/update", name: "app_api_application_update", methods: ["PUT"])]
    public function updateApplication(Request $request, ApplicationRepository $applicationRepository, EntityManagerInterface $entityManager, ValidatorInterface $validator, JWTEncoderInterface $JWTEncoder): Response {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if ($requestData === null || empty($requestData["application_id"])) {
            return $this->json([
                "success" => false,
                "error" => "invalid inputs",
            ]);
        }

        $application = $applicationRepository->find($requestData["application_id"]);

        if (!$application) {
            return $this->json([
                "success" => false,
                "error" => "invalid application id",
            ]);
        }

        if (!empty($requestData["application_message"])) {
            $application->setMessage($requestData["application_message"]);
        }

        if (!empty($requestData["application_firstname"])) {
            $application->setFirstname($requestData["application_firstname"]);
        }

        if (!empty($requestData["application_lastname"])) {
            $application->setLastname($requestData["application_lastname"]);
        }

        if (!empty($requestData["application_email"])) {
            $application->setEmail($requestData["application_email"]);
        }

        if (!empty($requestData["application_phone"])) {
            $application->setPhone($requestData["application_phone"]);
        }

        $errors = $validator->validate($application);

        if (count($errors) > 0) {
            return $this->json([
                "success" => false,
                "error" => "invalid inputs (validator)",
            ]);
        }

        $entityManager->flush();

        return $this->json([
            "success" => true,
            "application_id" => $application->getId(),
        ]);
    }


    #[Route("/api/application/{id}/delete", name: "app_api_application_delete", methods: ["DELETE"])]
    public function deleteApplicationById(Application $application =  null, EntityManagerInterface $entityManager, Request $request, JWTEncoderInterface $JWTEncoder): Response
    {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }
        
        if (!$application) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result); 
        }

        $entityManager->remove($application);
        $entityManager->flush();

        $result = array(
            "success" => true,
        );

        return $this->json($result);
    }


    // Company
    #[Route("/api/company", name: "app_api_companies", methods: ["GET"])]
    public function getCompanies(CompanyRepository $companyRepository): Response
    {   
        $companies = $companyRepository->findAll();

        $result = array();

        foreach ($companies as $company) {
            $result[] = array(
                "company_id" => $company->getId(),
                "company_name" => $company->getName(),
            );
        }

        return $this->json($result);
    }

    #[Route("/api/company/create", name: "app_api_company_create", methods: ["POST"])]
    public function createCompany(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, JWTEncoderInterface $JWTEncoder): Response
    {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        $company = new Company();

        $company->setName($requestData["company_name"]);

        $errors = $validator->validate($company);
        
        if (count($errors) > 0) {
            $result = array(
                "success" => false,
                "error" => "invalid input",
            );
    
            return $this->json($result);
        }

        $entityManager->persist($company);
        $entityManager->flush();

        $result = array(
            "success" => true,
            "company_id" => $company->getId(),
        );

        return $this->json($result);
    }

    #[Route("/api/company/update", name: "app_api_company_update", methods: ["PUT"])]
    public function updateCompany(Request $request, EntityManagerInterface $entityManager, CompanyRepository $companyRepository, ValidatorInterface $validator, JWTEncoderInterface $JWTEncoder): Response {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if ($requestData == null) {
            $result = array(
                "success" => false,
                "error" => "invalid inputs",
            );
            
            return $this->json($result);
        }

        $company = $companyRepository->find($requestData["company_id"]);

        if (!$company) {
            $result = array(
                "success" => false,
                "error" => "invalid company id",
            );
            
            return $this->json($result);
        }

        $company->setName($requestData["company_name"]);

        $errors = $validator->validate($company);
        
        if (count($errors) > 0) {
            $result = array(
                "success" => false,
                "error" => "invalid input (errors by validator)",
            );
    
            return $this->json($result);
        }

        $entityManager->flush($company);
        
        $result = array(
            "success" => true,
            "company_id" => $company->getId(),
        );

        return $this->json($result);
    }


    #[Route("/api/company/{id}", name: "app_api_company", methods: ["GET"])]
    public function getCompanyById(Company $company = null, CompanyRepository $companyRepository): Response
    {
        if (!$company) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result);
        };

        $result = array(
            "success" => true,
            "company_id" => $company->getId(),
            "companyname" => $company->getName(),
        );

        return $this->json($result);
    }

    #[Route("/api/company/{id}/delete", name: "app_api_company_delete", methods: ["DELETE"])]
    public function deleteCompanyById(Company $company = null, EntityManagerInterface $entityManager, Request $request, JWTEncoderInterface $JWTEncoder): Response
    {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if (!$company) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result);
        }

        $entityManager->remove($company);
        $entityManager->flush();

        $result = array(
            "success" => true,
        );

        return $this->json($result);
    }

    // User
    #[Route("/api/user", name: "app_api_users", methods: ["GET"])]
    public function getUsers(UserRepository $userRepository): Response
    {   
        $users = $userRepository->findAll();

        $result = array();

        foreach ($users as $user) {
            $result[] = array(
                "user_id" => $user->getId(),
                "user_email" => $user->getEmail(),
                "user_roles"=> $user->getRoles(),
                "user_firstname"=>$user->getFirstname(),
                "user_lastname"=>$user->getLastname(),
                "user_phone"=>$user->getPhone(),
            );
        }

        return $this->json($result);
    }

    #[Route("/api/user/create", name: "app_api_user_create", methods: ["POST"])]
    public function createUser(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, UserPasswordHasherInterface $passwordHasher, JWTEncoderInterface $JWTEncoder): Response {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if ($requestData === null) {
            return $this->json([
                "success" => false,
                "error" => "invalid inputs",
            ]);
        }

        $user = new User();
        $user->setEmail($requestData["user_email"] ?? null);
        $user->setFirstname($requestData["user_firstname"] ?? null);
        $user->setLastname($requestData["user_lastname"] ?? null);
        $user->setPhone($requestData["user_phone"] ?? null);

        $roles = [];
        if (($requestData["user_roles"] ?? '') === "ROLE_ADMIN") {
            $roles[] = "ROLE_ADMIN";
        } else {
            $roles[] = "ROLE_USER";
        }
        $user->setRoles($roles);

        if (empty($requestData["user_password"])) {
            return $this->json([
                "success" => false,
                "error" => "password is required",
            ]);
        }

        $hashedPassword = $passwordHasher->hashPassword($user, $requestData["user_password"]);
        $user->setPassword($hashedPassword);

        $errors = $validator->validate($user);

        if (count($errors) > 0) {
            return $this->json([
                "success" => false,
                "error" => "invalid inputs (validator)",
            ]);
        }

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
            "success" => true,
            "user_id" => $user->getId(),
        ]);
    }

    #[Route("/api/myuser", name: "app_api_myuser", methods: ["GET"])]
    public function getMyUser(): Response
    {
        if (!$this->getUser()) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result);
        };

        $result = array(
            "sucess" => true,
            "user_id" => $this->getUser()->getId(),
            "user_email" => $this->getUser()->getEmail(),
            "user_firstname" => $this->getUser()->getFirstname(),
            "user_lastname" => $this->getUser()->getLastname(),
            "user_phone" => $this->getUser()->getPhone() ?? "Non défini",
        );

        return $this->json($result);
    }

    #[Route("/api/user/{id}", name: "app_api_user", methods: ["GET"])]
    public function getUserAPI(User $user = null, UserRepository $userRepository): Response
    {
        if (!$user) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result);
        };

        $result = array(
            "sucess" => true,
            "user_id" => $user->getId(),
            "user_email" => $user->getEmail(),
            "user_roles"=> $user->getRoles(),
            "user_firstname"=>$user->getFirstname(),
            "user_lastname"=>$user->getLastname(),
            "user_phone"=>$user->getPhone(),
        );

        return $this->json($result);
    }

    #[Route("/api/user/update", name: "app_api_user_update", methods: ["PUT"])]
    public function updateUser(Request $request,EntityManagerInterface $entityManager,UserRepository $userRepository,ValidatorInterface $validator, JWTEncoderInterface $JWTEncoder): Response {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }

        if ($requestData === null || empty($requestData["user_id"])) {
            return $this->json([
                "success" => false,
                "error" => "invalid inputs",
            ]);
        }

        $user = $userRepository->find($requestData["user_id"]);

        if (!$user) {
            return $this->json([
                "success" => false,
                "error" => "invalid user id",
            ]);
        }

        if (!empty($requestData["user_email"])) {
            $user->setEmail($requestData["user_email"]);
        }

        if (!empty($requestData["user_firstname"])) {
            $user->setFirstname($requestData["user_firstname"]);
        }

        if (!empty($requestData["user_lastname"])) {
            $user->setLastname($requestData["user_lastname"]);
        }

        if (!empty($requestData["user_phone"])) {
            $user->setPhone($requestData["user_phone"]);
        }

        $errors = $validator->validate($user);

        if (count($errors) > 0) {
            return $this->json([
                "success" => false,
                "error" => "invalid inputs (validator)",
            ]);
        }

        $entityManager->flush();

        return $this->json([
            "success" => true,
            "user_id" => $user->getId(),
        ]);
    }

    #[Route("/api/user/{id}/delete", name: "app_api_user_delete", methods: ["DELETE"])]
    public function deleteUser(User $user = null, EntityManagerInterface $entityManager, Request $request, JWTEncoderInterface $JWTEncoder): Response
    {
        $requestData = json_decode($request->getContent(), true);

        $token = $requestData['adminToken'] ?? null;

        if (!$token) {
            return $this->json(['success' => false, 'error' => 'Token not found']);
        }

        try {
            $payload = $JWTEncoder->decode($token);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => "Invalid token",
            ]);
        }
        
        if (!$user) {
            $result = array(
                "success" => false,
                "error" => "notfound",
            );

            return $this->json($result);
        }

        $entityManager->remove($user);
        $entityManager->flush();

        $result = array(
            "success" => true,
        );

        return $this->json($result);
    }

}
