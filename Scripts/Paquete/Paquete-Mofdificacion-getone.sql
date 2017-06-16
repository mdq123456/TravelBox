USE [DBTravelBox]
GO
/****** Object:  StoredProcedure [dbo].[SP_PAQUETE_GETALL]    Script Date: 16/06/2017 15:50:35 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SP_PAQUETE_GETALL]
	AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	select
		 codPaquete,
		 Ancho,
		 Largo,
		 Alto,
		 NivelFragilidad,
		 Peso,
		 Observaciones

	 from Paquetes

END

GO
/****** Object:  StoredProcedure [dbo].[SP_PAQUETE_GETONE]    Script Date: 16/06/2017 15:50:35 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
Create PROCEDURE [dbo].[SP_PAQUETE_GETONE]
	-- Add the parameters for the stored procedure here
	@codPaquete int
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SELECT *
FROM Paquetes where codPaquete = @codPaquete
END
GO
/****** Object:  StoredProcedure [dbo].[SP_PAQUETE_MODIFICAR]    Script Date: 16/06/2017 15:50:36 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
Alter PROCEDURE [dbo].[SP_PAQUETE_MODIFICAR]
	@codPaquete int,
	@Ancho decimal(8,2),
	@Largo decimal(8,2),
	@Alto decimal(8,2),
	@NivelFragilidad int,
	@Peso decimal(8,2),
	@Observaciones varchar(140)
AS
BEGIN

	SET NOCOUNT ON;

	begin try

		if (@Ancho = ''	or @Largo = '' 
						or @Alto = ''
						or @NivelFragilidad = ''
						or @Peso = ''
						or @Observaciones='')
		begin
			select 'Complete todos los datos correctamente para continuar.' as Retorno
			return
		end


	
		begin transaction

		UPDATE [dbo].[Paquetes]
   SET [Ancho] = @Ancho
      ,[Largo] = @Largo
      ,[Alto] = @Alto
      ,[NivelFragilidad] = @NivelFragilidad
      ,[Peso] = @Peso
      ,[Observaciones] = @Observaciones

 WHERE codPaquete = @codPaquete
		
		
		commit transaction

		select 'ok' as Retorno

	end try
	begin catch
		
		if (@@TRANCOUNT > 0)
		begin
			rollback tran
		end
		select ERROR_MESSAGE() as Retorno;

	end catch
End

GO
