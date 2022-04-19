<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\ProductsRepository;
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
     */
    public function index(ProductsRepository $productsRepository)
    {
        return $this->render('products/index.html.twig', [
            'products' => $productsRepository->findAll()
        ]);
    }





    /**
     * @Route("/ind", name="prod_index", methods={"GET"})
     */
    public function indexadmin(ProductsRepository $productsRepository): Response
    {
        return $this->render('prod/index.html.twig', [
            'products' => $productsRepository->findAll(),
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
