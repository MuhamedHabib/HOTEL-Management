<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\ProductsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prod")
 */
class ProductsController extends AbstractController
{
    /**
     * @Route("/", name="product_index")
     * @param Request $request
     *  @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(ProductsRepository $productsRepository,Request $request, PaginatorInterface $paginator)// Nous ajoutons les paramètres requis ici
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $products = $productsRepository->findAll();

        $productsfinal = $paginator->paginate(
            $products, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );



        return $this->render('products/index.html.twig', [
            'products' => $productsfinal,
        ]);
    }





    /**
     * @Route("/ind", name="prod_index", methods={"GET"})
     * @param PaginatorInterface $paginator
     * @return Response
     * @param Request $request
     */
    public function indexadmin(ProductsRepository $productsRepository,PaginatorInterface $paginator,Request $request): Response
    {

        $products = $productsRepository->findAll();

        $paginatorProduits=$paginator->paginate(
            $products,
            /* query NOT result */
            $request->query->getInt('page', 1), /*numero de page en cours 1 par défaut*/
            3 /*limit per page*/
        );


        return $this->render('prod/index.html.twig', [
            'products' => $products,"paginator"=>$paginatorProduits
        ]);
    }





    /**
     * @Route("/new", name="prod_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $product = new Products();
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {


            ////////////
            ///
            ///
            ///
            $image = $request->files->get('products')['image'];

            $uploads_directory = $this->getParameter('kernel.root_dir') . '/../public/img';

            $filename = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $uploads_directory,
                $filename
            );
            $product->setImage($filename);
            ///////////
            ///
            ///
            ///
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('prod_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('prod/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }





    /**
     * @Route("/{id}", name="prod_show", methods={"GET"})
     */
    public function show(Products $product): Response
    {
        return $this->render('prod/show.html.twig', [
            'product' => $product,
        ]);
    }




    /**
     * @Route("/{id}/edit", name="prod_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Products $product): Response
    {
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            ///////
            ///
            ///
            $image = $request->files->get('products')['image'];
            $uploads_directory = $this->getParameter('kernel.root_dir') . '/../public/img';
            $filename = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $uploads_directory,
                $filename
            );

            $product->setImage($filename);
            ///
            /// ///

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prod_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('prod/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prod_delete", methods={"POST"})
     */
    public function delete(Request $request, Products $product): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prod_index', [], Response::HTTP_SEE_OTHER);
    }









}
